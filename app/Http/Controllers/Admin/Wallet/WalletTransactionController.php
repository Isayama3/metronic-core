<?php

namespace App\Http\Controllers\Admin\Wallet;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\WalletTransactionRequest as FormRequest;
use App\Models\WalletTransaction as Model;
use App\Services\WalletTransactionService as Service;

class WalletTransactionController extends BaseWebController
{
    protected $WalletTransactionService;
    
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
            view_path: 'admin.wallet-transactions.'
        );
        
        $this->WalletTransactionService = $service;
        $this->WalletTransactionService->setIndexRelations([]);
        $this->WalletTransactionService->setOneItemRelations([]);
        $this->WalletTransactionService->setCustomWhen($this->customWhen());
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
