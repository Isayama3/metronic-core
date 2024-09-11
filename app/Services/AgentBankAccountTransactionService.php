<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Enums\AgentWalletTransactionBalances;
use App\Repositories\BankAccountTransactionRepository;

class AgentBankAccountTransactionService extends BaseService
{
    protected BankAccountTransactionRepository $BankAccountTransactionRepository;
    protected AgentWalletService $AgentWalletService;
    protected AgentWalletTransactionService $AgentWalletTransactionService;

    public function __construct(BankAccountTransactionRepository $BankAccountTransactionRepository, AgentWalletService $AgentWalletService, AgentWalletTransactionService $AgentWalletTransactionService)
    {
        parent::__construct($BankAccountTransactionRepository);
        $this->BankAccountTransactionRepository = $BankAccountTransactionRepository;
        $this->AgentWalletService = $AgentWalletService;
        $this->AgentWalletTransactionService = $AgentWalletTransactionService;
    }

    public function store($data)
    {
        if ($this->AgentWalletService->checkIfAgentHasEnoughMoneyToDeposit(auth('admin')->user()->wallet, $data['amount'])) {
            $this->AgentWalletTransactionService->updateTransaction(
                auth('admin')->user()->wallet,
                $data['amount'],
                AgentWalletTransactionBalances::DEPOSITED->value,
                AgentWalletTransactionBalances::WITHDRAWN->value,
            );

            return parent::store($data);
        }

        $this->throwHttpExceptionForWebAndApi(message: __('admin.money_is_not_enough_to_deposit.'), redirect: 'admin.agent-bank-account-transactions.create');
    }
}
