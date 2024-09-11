<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\AgentWalletRepository;

class AgentWalletService extends BaseService
{
    protected AgentWalletRepository $AgentWalletRepository;

    public function __construct(AgentWalletRepository $AgentWalletRepository)
    {
        parent::__construct($AgentWalletRepository);
        $this->AgentWalletRepository = $AgentWalletRepository;
    }
    public function getDepositedMoney($agent_wallet)
    {
        return $this->AgentWalletRepository->getDepositedMoney($agent_wallet);
    }
    
    public function checkIfAgentHasEnoughMoneyToDeposit($agent_wallet, $amount)
    {
        $deposited_money = $this->getDepositedMoney($agent_wallet);
        return $deposited_money >= $amount;
    }
}
