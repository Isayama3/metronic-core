<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Enums\RideRequestStatus;
use App\Enums\RideStatus;
use App\Enums\WalletBalances;
use App\Enums\WalletTransactionType;
use App\Models\Ride;
use App\Repositories\RideRepository;
use App\Repositories\RideRequestRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class RideRequestService extends BaseService
{
    protected RideRequestRepository $RideRequestRepository;
    protected RideRepository $RideRepository;
    protected SettingService $SettingService;
    protected WalletTransactionService $WalletTransactionService;

    public function __construct(RideRequestRepository $RideRequestRepository, RideRepository $RideRepository, WalletTransactionService $WalletTransactionService, SettingService $SettingService)
    {
        parent::__construct($RideRequestRepository);
        $this->SettingService = $SettingService;
        $this->RideRequestRepository = $RideRequestRepository;
        $this->RideRepository = $RideRepository;
        $this->WalletTransactionService = $WalletTransactionService;
    }

    public function store($data)
    {
        $ride = $this->RideRepository->find($data['ride_id']);
        $this->checkIfRideHasTheMaximumPassengers($ride);
        $this->checkIfRideIsExceedTheScheduledTime($ride);
        $data['price'] = $ride->price_per_seat;

        if ($ride->instant_booking == true || $ride->instant_booking == 1) {
            $data['status_id'] = RideRequestStatus::ACCEPTED->value;
        }

        return parent::store($data);
    }

    public function accept($id)
    {
        $ride_request = $this->RideRequestRepository->getSpecificAuthDriverRideRequest($id, ['ride']);
        $ride = $ride_request->ride;
        $this->checkIfRideIsPending($ride);
        $this->checkIfRideHasTheMaximumPassengers($ride);
        $this->checkIfRideRequestIsNotSpecificStatus($ride_request, RideRequestStatus::PENDING->value, __('main.ride_request_not_pending'));
        $this->update($ride_request->id, ['status_id' => RideRequestStatus::ACCEPTED->value]);
    }

    public function reject($id)
    {
        $ride_request = $this->RideRequestRepository->getSpecificAuthDriverRideRequest($id, ['ride']);
        $ride = $ride_request->ride;
        $this->checkIfRideIsPending($ride);
        $this->checkIfRideRequestIsNotSpecificStatus($ride_request, RideRequestStatus::PENDING->value, __('main.ride_request_not_pending'));
        $this->update($ride_request->id, ['status_id' => RideRequestStatus::REJECTED->value]);
    }

    public function paid($id)
    {
        DB::beginTransaction();
        try {
            $ride_request = $this->RideRequestRepository->getSpecificAuthDriverRideRequest($id, ['user', 'user.wallet']);
            $this->checkIfRideRequestIsNotSpecificStatus($ride_request, RideRequestStatus::ACCEPTED->value, __('main.ride_request_not_accepted'));
            $this->checkIfRideRequestIsPaid($ride_request);

            $this->update($ride_request->id, ['is_paid' => true]);
            // $this->WalletTransactionService->make(
            //     wallet: $ride_request->user->wallet,
            //     ride_request_id: $ride_request->id,
            //     amount: $ride_request->price,
            //     transaction_type: WalletTransactionType::RIDE->value,
            //     status: WalletBalances::TRIPUSEDMONEY->value,
            // );

            $this->WalletTransactionService->make(
                wallet: $ride_request->driver->wallet,
                ride_request_id: $ride_request->id,
                amount: $ride_request->price,
                transaction_type: WalletTransactionType::RIDE->value,
                status: WalletBalances::WALLETBALANCE->value,
            );

            $this->WalletTransactionService->updateTransaction(
                wallet: auth('user-api')->user()->wallet,
                amount: $ride_request->price - ($ride_request->price * $this->SettingService->getRideRequestCommissionInPercentage()),
                from: WalletBalances::WALLETBALANCE->value,
                to: WalletBalances::WITHDRAWMONEY->value,
                transaction_type: WalletTransactionType::RIDE->value,
                ride_request_id: $id,
            );
            $this->WalletTransactionService->updateTransaction(
                wallet: auth('user-api')->user()->wallet,
                amount: $ride_request->price * $this->SettingService->getRideRequestCommissionInPercentage(),
                from: WalletBalances::WALLETBALANCE->value,
                to: WalletBalances::TOBEDEPOSITE->value,
                transaction_type: WalletTransactionType::RIDE->value,
                ride_request_id: $id,
            );

            DB::commit();
        } catch (ModelNotFoundException $e) {
            dd($e->getMessage());
            return $this->throwHttpExceptionForWebAndApi(__("Resource not found"), 422);
        } catch (HttpResponseException $e) {
            throw $e;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return $this->throwHttpExceptionForWebAndApi(__("main.you_already_book_a_ride"), 422);
        }
    }

    public function cancel($id)
    {
        $ride_request = $this->RideRequestRepository->getSpecificAuthUserRideRequest($id);
        $this->checkIfRideRequestIstSpecificStatus($ride_request, RideRequestStatus::PENDING->value, __('main.ride_request_not_pending'));
        $this->update($ride_request->id, ['status_id' => RideRequestStatus::REJECTED->value]);
    }

    public function checkIfUserAlreadyBookARide($ride_id)
    {
        $ride = $this->RideRepository->find($ride_id);
        $ride_request = $ride->requests->where('user_id', auth()->id())->first();
        if ($ride_request !== null) {
            return $this->throwHttpExceptionForWebAndApi(__("main.you_already_book_a_ride"), 422);
        }
    }

    public function checkIfRideHavePendingRequests($ride)
    {
        $pending_and_accepted_requests_count = $this->getRidePendingRequestsCount($ride);
        if ($pending_and_accepted_requests_count > 0) {
            return $this->throwHttpExceptionForWebAndApi(__("main.ride_have_requests_that_need_action_before_start_the_ride"), 422);
        }
    }

    public function checkIfRideRequestIsNotAcceptedAndIsNotPaid($ride_request)
    {
        $this->checkIfRideRequestIsNotSpecificStatus($ride_request, RideRequestStatus::PENDING->value, __('main.ride_request_not_accepted'));
        if ($ride_request->is_paid !== true) {
            return $this->throwHttpExceptionForWebAndApi(__("main.ride_request_is_not_paid"), 422);
        }
    }

    public function checkIfAcceptedRideRequestIsNotPaid($ride_request)
    {
        if ($ride_request->status_id === RideRequestStatus::ACCEPTED->value && $ride_request->is_paid !== true) {
            return $this->throwHttpExceptionForWebAndApi(__("main.ride_request_is_not_paid"), 422);
        }
    }

    public function checkIfRideHasTheMaximumPassengers($ride)
    {
        $accepted_requests = ($this->RideRequestRepository->getRideRequestsCount($ride, [RideRequestStatus::ACCEPTED->value]));
        if ($ride->passengers_limit < $accepted_requests) {
            return $this->throwHttpExceptionForWebAndApi(__("main.ride_has_maximum_passengers"), 422);
        }
    }

    public function checkIfUserOwnTheRide($ride_id)
    {
        $ride = $this->RideRepository->find($ride_id);
        if ($ride->user_id == auth()->id()) {
            return $this->throwHttpExceptionForWebAndApi(__("main.you_cannot_request_your_ride"), 422);
        }
    }

    public function checkIfRideIsExceedTheScheduledTime($ride)
    {
        if ($ride->date_schedule < Carbon::now()) {
            return $this->throwHttpExceptionForWebAndApi(__("main.ride_is_exceed_the_scheduled_time"), 422);
        }
    }

    public function checkIfRideRequestIsPaid($ride_request)
    {
        if ($ride_request->is_paid == true) {
            return $this->throwHttpExceptionForWebAndApi(__("main.ride_request_already_paid"), 422);
        }

    }

    public function getRidePendingAndAcceptedRequests(Ride $ride)
    {
        return $ride->requests->whereIn('status_id', [RideRequestStatus::PENDING->value, RideRequestStatus::ACCEPTED->value])->get();
    }

    public function checkIfRideRequestIsNotSpecificStatus($ride_request, $status, $message)
    {
        if ($ride_request->status_id !== $status) {
            return $this->throwHttpExceptionForWebAndApi($message, 422);
        }
    }

    public function checkIfRideRequestIstSpecificStatus($ride_request, $status, $message)
    {
        if ($ride_request->status_id == $status) {
            return $this->throwHttpExceptionForWebAndApi($message, 422);
        }
    }

    public function getRidePendingRequestsCount(Ride $ride)
    {
        return $ride->requests()->where('status_id', RideRequestStatus::PENDING->value)->count();
    }

    public function checkIfRideIsPending($ride)
    {
        if ($ride->status_id !== RideStatus::NEW ->value) {
            return $this->throwHttpExceptionForWebAndApi(__('main.ride_is_not_pending'), 422);
        }
    }
}
