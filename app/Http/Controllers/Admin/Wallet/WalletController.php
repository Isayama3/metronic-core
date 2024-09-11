<?php

namespace App\Http\Controllers\Admin\Wallet;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\WalletRequest as FormRequest;
use App\Models\Wallet as Model;
use App\Services\WalletService as Service;

class WalletController extends BaseWebController
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
            $service,
            hasDelete: true,
            hasShow: false,
            hasCreate: true,
            hasEdit: true,
            view_path: 'admin.Wallet.'
        );
        
        $this->WalletService = $service;
        $this->WalletService->setIndexRelations([]);
        $this->WalletService->setOneItemRelations([]);
        $this->WalletService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => false,
            'callback' => function ($q) {
            },
        ];
    }
}
