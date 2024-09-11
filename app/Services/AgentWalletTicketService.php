<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\AgentWalletTicketRepository;

class AgentWalletTicketService extends BaseService
{
    protected AgentWalletTicketRepository $AgentWalletTicketRepository;

    public function __construct(AgentWalletTicketRepository $AgentWalletTicketRepository)
    {
        parent::__construct($AgentWalletTicketRepository);
        $this->AgentWalletTicketRepository = $AgentWalletTicketRepository;
    }
}


