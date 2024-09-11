<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Base\Traits\Custom\HttpExceptionTrait;
use App\Enums\AgentWalletBalances;
use App\Enums\WalletBalances;
use App\Enums\WalletTicketStatus;
use App\Enums\WalletTransactionType;
use App\Repositories\WalletTicketRepository;

class WalletTicketService extends BaseService
{
    use HttpExceptionTrait;
    protected WalletTicketRepository $WalletTicketRepository;
    protected WalletService $WalletService;
    protected WalletTransactionService $WalletTransactionService;
    protected AgentWalletTransactionService $AgentWalletTransactionService;

    public function __construct(
        WalletTicketRepository $WalletTicketRepository,
        WalletService $WalletService,
        WalletTransactionService $WalletTransactionService,
        AgentWalletTransactionService $AgentWalletTransactionService
    ) {
        parent::__construct($WalletTicketRepository);
        $this->WalletTicketRepository = $WalletTicketRepository;
        $this->WalletService = $WalletService;
        $this->WalletTransactionService = $WalletTransactionService;
        $this->AgentWalletTransactionService = $AgentWalletTransactionService;
    }

    public function store($data)
    {
        $this->checkUserWalletToBeDeposit(auth('user-api')->id(), $data['balance']);
        return parent::store($data);
    }

    public function checkUserWalletToBeDeposit($user_id, $amount)
    {
        $user_to_be_deposit_money = $this->WalletService->getUserWallet($user_id)->to_be_deposit;
        $total_open_tickets_money = $this->WalletTicketRepository->getTotalOpenTicketsMoneyBalance($user_id);
        $balance_to_be_deposit = $user_to_be_deposit_money - $total_open_tickets_money;

        if ($balance_to_be_deposit < $amount) {
            return $this->throwHttpExceptionForWebAndApi(__('main.the_available_money_to_be_deposit_is') . ' ' . $balance_to_be_deposit, 422);
        }
    }

    public function collectMoney(array $data, $id)
    {
        $record = $this->repository->find($id, ['driver', 'driver.wallet']);

        if ($record->status_id != WalletTicketStatus::PENDING->value) {
            return $this->throwHttpExceptionForWebAndApi(__('admin.ticket_is_not_pending'), 422);
        }

        if ($record->code !== $data['code']) {
            return $this->throwHttpExceptionForWebAndApi(__('admin.invalid_code'), 422);
        }

        $this->WalletTransactionService->updateTransaction(
            wallet: $record->driver->wallet,
            amount: $data['amount'],
            from: WalletBalances::TOBEDEPOSITE->value,
            to: WalletBalances::DEPOSITEDMONEY->value,
            transaction_type: WalletTransactionType::AGENT->value,
            agent_id: auth('admin')->id(),
        );

        $this->AgentWalletTransactionService->make(
            auth('admin')->user()?->wallet?->id,
            $data['amount'],
            AgentWalletBalances::DEPOSITED->value
        );

        $this->WalletTicketRepository->update($id, ['status_id' => WalletTicketStatus::COLLECTED->value]);
    }

    public function reject($id)
    {
        $record = $this->repository->find($id);

        if ($record->status_id != WalletTicketStatus::PENDING->value) {
            return $this->throwHttpExceptionForWebAndApi(__('admin.ticket_is_not_pending'), 422);
        }

        $this->WalletTicketRepository->update($id, ['status_id' => WalletTicketStatus::REJECTED->value]);
    }
}
