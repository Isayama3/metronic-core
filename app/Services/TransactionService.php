<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\TransactionRepository;

class TransactionService extends BaseService
{
    protected TransactionRepository $TransactionRepository;

    public function __construct(TransactionRepository $TransactionRepository)
    {
        parent::__construct($TransactionRepository);
        $this->TransactionRepository = $TransactionRepository;
    }
}


