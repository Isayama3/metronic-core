<?php

namespace App\Http\Controllers\Admin\BankAccount;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\BankAccountTransactionRequest as FormRequest;
use App\Models\BankAccountTransaction as Model;
use App\Services\BankAccountTransactionService as Service;

class BankAccountTransactionController extends BaseWebController
{
    protected $BankAccountTransactionService;

    public function __construct(
        FormRequest $request,
        Model $model,
        Service $service,
    ) {
        parent::__construct(
            $request,
            $model,
            $service,
            hasDelete: false,
            hasShow: false,
            hasCreate: false,
            hasEdit: false,
            view_path: 'admin.bank-account-transactions.'
        );

        $this->BankAccountTransactionService = $service;
        $this->BankAccountTransactionService->setIndexRelations([]);
        $this->BankAccountTransactionService->setOneItemRelations([]);
        $this->BankAccountTransactionService->setCustomWhen($this->customWhen());
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
