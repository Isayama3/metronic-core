<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\AgentRepository;

class AgentService extends BaseService
{
    protected AgentRepository $AgentRepository;
    protected AgentWalletService $AgentWalletService;

    public function __construct(AgentRepository $AgentRepository, AgentWalletService $AgentWalletService)
    {
        parent::__construct($AgentRepository);
        $this->AgentRepository = $AgentRepository;
        $this->AgentWalletService = $AgentWalletService;
    }

    public function store($data)
    {
        $record = parent::store($data);
        $record->syncRoles(['agent']);
        $this->AgentWalletService->store(['admin_id' => $record->id]);
        return $record;
    }

    public function update($id, $data)
    {
        $record = parent::update($id, $data);
        $record->syncRoles(['agent']);
        return $record;
    }
}
