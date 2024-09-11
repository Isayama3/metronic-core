<?php

namespace App\Http\Controllers\User\Wallet;

use App\Base\Controllers\BaseApiController;
use App\Http\Requests\User\WalletTicketRequest as FormRequest;
use App\Http\Resources\WalletTicketResource as Resource;
use App\Models\WalletTicket as Model;
use App\Services\WalletTicketService as Service;

class WalletTicketController extends BaseApiController
{
    protected $WalletTicketService;

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

        $this->WalletTicketService = $service;
        $this->WalletTicketService->setIndexRelations(['status', 'agent']);
        $this->WalletTicketService->setOneItemRelations(['status', 'agent']);
        $this->WalletTicketService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => true,
            'callback' => function ($q) {
                $q->where('driver_id', auth('user-api')->id());
            },
        ];
    }
}
