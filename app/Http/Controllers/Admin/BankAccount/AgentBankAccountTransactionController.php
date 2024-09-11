<?php

namespace App\Http\Controllers\Admin\BankAccount;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\AgentBankAccountTransactionRequest as FormRequest;
use App\Models\BankAccountTransaction as Model;
use App\Services\AgentBankAccountTransactionService as Service;

class AgentBankAccountTransactionController extends BaseWebController
{
    protected $AgentBankAccountTransactionService;

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
            hasCreate: true,
            hasEdit: false,
            view_path: 'admin.agent-bank-account-transactions.'
        );

        $this->AgentBankAccountTransactionService = $service;
        $this->AgentBankAccountTransactionService->setIndexRelations([]);
        $this->AgentBankAccountTransactionService->setOneItemRelations([]);
        $this->AgentBankAccountTransactionService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => true,
            'callback' => function ($q) {
                $q->where('agent_id', auth('admin')->id());
            },
        ];
    }
}
