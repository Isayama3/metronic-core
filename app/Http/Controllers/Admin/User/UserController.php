<?php

namespace App\Http\Controllers\Admin\User;

use App\Base\Controllers\BaseWebController;
use App\Base\Traits\Response\ApiResponseTrait;
use App\Enums\WalletTransactionType;
use App\Http\Requests\Admin\AddToUserWalletRequest;
use App\Http\Requests\Admin\UserRequest as FormRequest;
use App\Models\User as Model;
use App\Services\UserService as Service;
use App\Services\WalletTransactionService;

class UserController extends BaseWebController
{
    use ApiResponseTrait;

    protected $UserService;
    protected $WalletTransactionService;

    public function __construct(
        FormRequest $request,
        Model $model,
        Service $service,
        WalletTransactionService $WalletTransactionService,
    ) {
        parent::__construct(
            $request,
            $model,
            $service,
            view_path: 'admin.users.',
            hasCreate: false,
            hasEdit: false,
            hasDelete: false,
            storePermission: 'admin.users.store',
            showPermission: 'admin.users.show',
            updatePermission: 'admin.users.update',
            destroyPermission: 'admin.users.destroy',
        );

        $this->UserService = $service;
        $this->WalletTransactionService = $WalletTransactionService;
        $this->UserService->setIndexRelations([]);
        $this->UserService->setOneItemRelations(['rideRequests', 'vehicles', 'wallet', 'rides', 'rides.driver', 'rideRequests.driver','rideRequests.ride','rideRequests.ride.driver', 'rideRequests.user']);
        $this->UserService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => false,
            'callback' => function ($q) {},
        ];
    }

    public function showWallet($id)
    {
        $record = $this->UserService->findOrFail($id, ['wallet', 'wallet.transactions']);
        $transactions = $record
            ->wallet
            ->transactions()
            ->with(['agent', 'status'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('admin.users.wallet', compact('record', 'transactions'));
    }

    public function addToWallet($id, AddToUserWalletRequest $request)
    {
        $user_wallet_id = $this->UserService->findOrFail($id, ['wallet'])->wallet->id;
        $this->WalletTransactionService->addBonus($user_wallet_id, $request->amount, WalletTransactionType::AGENT->value);
        return redirect()->back()->with('success', __('admin.bonus_added_successfully'));
    }
}
