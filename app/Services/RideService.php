<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Enums\RideStatus;
use App\Repositories\RideRepository;
use Illuminate\Support\Facades\DB;

class RideService extends BaseService
{
    protected RideRepository $RideRepository;
    protected VehicleService $VehicleService;
    protected UserService $UserService;
    protected RideRequestService $RideRequestService;
    protected UserVerificationService $UserVerificationService;
    protected VehicleVerificationService $VehicleVerificationService;
    protected RideStopoverService $RideStopoverService;
    protected WalletService $WalletService;

    public function __construct(
        RideRepository $RideRepository,
        VehicleService $VehicleService,
        UserService $UserService,
        RideRequestService $RideRequestService,
        UserVerificationService $UserVerificationService,
        VehicleVerificationService $VehicleVerificationService,
        RideStopoverService $RideStopoverService,
        WalletService $WalletService
    ) {
        parent::__construct($RideRepository);
        $this->RideRepository = $RideRepository;
        $this->VehicleService = $VehicleService;
        $this->WalletService = $WalletService;
        $this->UserService = $UserService;
        $this->RideRequestService = $RideRequestService;
        $this->UserVerificationService = $UserVerificationService;
        $this->VehicleVerificationService = $VehicleVerificationService;
        $this->RideStopoverService = $RideStopoverService;
    }

    public function index()
    {
        $this->RideRepository->setRelations($this->getIndexRelations());
        $this->RideRepository->setCustomWhen($this->getCustomWhen());
        return $this->RideRepository->searchByLocationAndSchedule(request()->filter, request()->sort);
    }

    public function getAllRidesWithoutAnyConditions()
    {
        $this->repository->initFilters();
        $this->repository->setRelations($this->getIndexRelations());
        $this->repository->setCustomWhen($this->getCustomWhen());
        return $this->repository->getAllDataPaginated();
    }

    public function store($data, $relations = [])
    {
        $this->UserVerificationService->checkUserNationalIDVerification();
        $this->UserVerificationService->checkUserDrivingLicenseVerification();
        $this->UserService->checkUserHaveVehicles();
        $this->WalletService->checkIfUserExceedsTheWalletLimit();
        $vehicle = $this->VehicleService->findOrFail($data['vehicle_id']);
        $this->VehicleVerificationService->checkVehicleLicenseVerification($vehicle->id);

        DB::beginTransaction();
        try {
            $ride = parent::store($data, $relations);

            if (isset($data['stopovers'])) {
                $ride->stopovers()->createMany($data['stopovers']);
            }

            $ride->refresh();
            DB::commit();
            return $ride;
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->throwHttpExceptionForWebAndApi($e->getMessage(), 422);
        }
    }

    public function startRide($id)
    {
        $this->RideRequestService->checkIfRideHavePendingRequests($this->RideRepository->find($id));
        $ride = $this->RideRepository->getSpecificAuthUserRide($id);
        $this->update($ride->id, ['status_id' => RideStatus::INPROGRESS->value]);
    }

    public function completeRide($id)
    {
        $ride = $this->RideRepository->getSpecificAuthUserRide($id);
        foreach ($ride->requests as $request) {
            $this->RideRequestService->checkIfAcceptedRideRequestIsNotPaid($request);
        }

        $this->update($ride->id, ['status_id' => RideStatus::COMPLETED->value]);
    }

    public function publishReturnRide($id, $date_schedule)
    {
        $ride = $this->RideRepository->getSpecificAuthUserRide($id);
        $return_ride = $ride->replicate();

        $return_ride->date_schedule = $date_schedule;
        $return_ride->pickup_address = $ride->dropoff_address;
        $return_ride->pickup_latitude = $ride->dropoff_latitude;
        $return_ride->pickup_longitude = $ride->dropoff_longitude;
        $return_ride->dropoff_address = $ride->pickup_address;
        $return_ride->dropoff_latitude = $ride->pickup_latitude;
        $return_ride->dropoff_longitude = $ride->pickup_longitude;
        $return_ride->save();

        return $return_ride;
    }
}
