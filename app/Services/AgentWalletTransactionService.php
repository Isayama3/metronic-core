<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Enums\AgentWalletBalances;
use App\Enums\AgentWalletTransactionStatus;
use App\Repositories\AgentWalletRepository;
use App\Repositories\AgentWalletTransactionRepository;

class AgentWalletTransactionService extends BaseService
{
    protected AgentWalletTransactionRepository $AgentWalletTransactionRepository;
    protected AgentWalletRepository $AgentWalletRepository;

    public function __construct(AgentWalletTransactionRepository $AgentWalletTransactionRepository, AgentWalletRepository $AgentWalletRepository)
    {
        parent::__construct($AgentWalletTransactionRepository);
        $this->AgentWalletRepository = $AgentWalletRepository;
        $this->AgentWalletTransactionRepository = $AgentWalletTransactionRepository;
    }

    public function make($wallet_id, $amount, $status)
    {
        // TODO WHY WHE HAVE COLLCETED AND DEPOSTED
        $arr = [
            AgentWalletBalances::WITHDRAWN->value => AgentWalletTransactionStatus::WITHDRAWN->value,
            AgentWalletBalances::DEPOSITED->value => AgentWalletTransactionStatus::DEPOSITED->value,
        ];

        $wallet = $this->AgentWalletRepository->find($wallet_id);
        $this->AgentWalletRepository->update($wallet_id, [$status => $wallet->$status + $amount]);

        $this->AgentWalletTransactionRepository->create([
            'wallet_id' => $wallet->id,
            'amount' => $amount,
            'status_id' => $arr[$status],
        ]);
    }

    public function updateTransaction($wallet, $amount, $from, $to)
    {
        $this->AgentWalletRepository->update($wallet->id, [
            $from => round($wallet->$from - $amount, 2) == 0 ? 0 : round($wallet->$from - $amount, 2),
            $to => round($wallet->$to + $amount, 2) == 0 ? 0 : round($wallet->$to + $amount, 2),
        ]);

        $this->AgentWalletTransactionRepository->create([
            'wallet_id' => $wallet->id,
            'amount' => $amount,
            'status_id' => AgentWalletTransactionStatus::WITHDRAWN->value,
        ]);
    }
}
