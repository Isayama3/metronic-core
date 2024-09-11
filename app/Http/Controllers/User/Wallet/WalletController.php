<?php

namespace App\Http\Controllers\User\Wallet;

use App\Base\Controllers\BaseApiController;
use App\Http\Requests\User\WalletRequest as FormRequest;
use App\Http\Resources\WalletResource as Resource;
use App\Models\Wallet as Model;
use App\Services\WalletService as Service;

class WalletController extends BaseApiController
{
    protected $WalletService;

    public function __construct(
        FormRequest $request,
        Model $model,
        Service $service,
    ) {
        parent::__construct(
            $request,
            $model,
            new Resource($model),
            $service,
            hasDelete: false,
        );

        $this->WalletService = $service;
        $this->WalletService->setIndexRelations([]);
        $this->WalletService->setOneItemRelations(['transactions', 'transactions.status', 'transactions.type', 'transactions.rideRequest']);
        $this->WalletService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => true,
            'callback' => function ($q) {
                return $q->where('user_id', auth('user-api')->id());
            },
        ];
    }
}
