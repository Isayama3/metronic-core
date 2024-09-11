<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Enums\WalletBalances;
use App\Enums\WalletTransactionStatus;
use App\Enums\WalletTransactionType;
use App\Repositories\WalletRepository;
use App\Repositories\WalletTransactionRepository;

class WalletTransactionService extends BaseService
{
    protected WalletTransactionRepository $WalletTransactionRepository;
    protected WalletRepository $walletRepository;

    public function __construct(WalletTransactionRepository $WalletTransactionRepository, WalletRepository $walletRepository)
    {
        parent::__construct($WalletTransactionRepository);
        $this->WalletTransactionRepository = $WalletTransactionRepository;
        $this->walletRepository = $walletRepository;
    }

    public function make($wallet, $ride_request_id, $amount, $transaction_type, $status, $agent_id = null)
    {
        $arr = [
            WalletBalances::WALLETBALANCE->value => WalletTransactionStatus::COLLECTED->value,
            WalletBalances::WITHDRAWMONEY->value => WalletTransactionStatus::WITHDRAWN->value,
            WalletBalances::TOBEDEPOSITE->value => WalletTransactionStatus::TOBEDEPOSIT->value,
            WalletBalances::DEPOSITEDMONEY->value => WalletTransactionStatus::DEPOSITED->value,
            WalletBalances::TRIPUSEDMONEY->value => WalletTransactionStatus::TRIPUSED->value,
            WalletBalances::FINEBALANCE->value => WalletTransactionStatus::FINE->value,
        ];

        $this->walletRepository->update($wallet->id, [$status => $wallet->$status + $amount]);
      
        $this->WalletTransactionRepository->create([
            'wallet_id' => $wallet->id,
            'ride_request_id' => $ride_request_id,
            'amount' => $amount,
            'agent_id' => $agent_id,
            'type_id' => $transaction_type,
            'status_id' => $arr[$status],
        ]);
    }

    public function updateTransaction($wallet, $amount, $from, $to, $transaction_type, $agent_id = null, $ride_request_id = null)
    {
        $arr = [
            WalletBalances::WALLETBALANCE->value => WalletTransactionStatus::COLLECTED->value,
            WalletBalances::WITHDRAWMONEY->value => WalletTransactionStatus::WITHDRAWN->value,
            WalletBalances::TOBEDEPOSITE->value => WalletTransactionStatus::TOBEDEPOSIT->value,
            WalletBalances::DEPOSITEDMONEY->value => WalletTransactionStatus::DEPOSITED->value,
            WalletBalances::TRIPUSEDMONEY->value => WalletTransactionStatus::TRIPUSED->value,
            WalletBalances::FINEBALANCE->value => WalletTransactionStatus::FINE->value,
        ];

        $this->walletRepository->update($wallet->id, [
            $from => round($wallet->$from - $amount, 2) == 0 ? 0 : round($wallet->$from - $amount, 2),
            $to => round($wallet->$to + $amount, 2) == 0 ? 0 : round($wallet->$to + $amount, 2),
        ]);

        $this->WalletTransactionRepository->create([
            'wallet_id' => $wallet->id,
            'ride_request_id' => $ride_request_id,
            'amount' => $amount,
            'agent_id' => $agent_id,
            'type_id' => $transaction_type,
            'status_id' => $arr[$to],
        ]);
    }

    public function addBonus($wallet_id, $amount)
    {
        $wallet = $this->walletRepository->find($wallet_id);
        $this->walletRepository->update($wallet_id, ['wallet_balance' => $wallet->wallet_balance + $amount]);

        $this->WalletTransactionRepository->create([
            'wallet_id' => $wallet_id,
            'admin_id' => auth('admin')->id(),
            'status_id' => WalletTransactionStatus::BONUS->value,
            'type_id' => WalletTransactionType::AGENT->value,
            'amount' => $amount,
        ]);
    }

    public function depositAll()
    {
        $wallet_transactions = $this->WalletTransactionRepository->findAllByStatus(WalletTransactionStatus::COLLECTED->value);

        foreach ($wallet_transactions as $wallet_transaction) {
            $wallet = $wallet_transaction->wallet;
            $this->walletRepository->update($wallet, [
                'wallet_balance' => $wallet->wallet_balance - $wallet_transaction->amount,
                'deposited_money' => $wallet->deposited_money + $wallet_transaction->amount,
            ]);
        }

        $this->WalletTransactionRepository->updateStatus(
            $wallet_transactions->pluck('id')->toArray(),
            WalletTransactionStatus::DEPOSITED->value
        );
    }
}
