<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\BankAccountTransactionRepository;

class BankAccountTransactionService extends BaseService
{
    protected BankAccountTransactionRepository $BankAccountTransactionRepository;

    public function __construct(BankAccountTransactionRepository $BankAccountTransactionRepository)
    {
        parent::__construct($BankAccountTransactionRepository);
        $this->BankAccountTransactionRepository = $BankAccountTransactionRepository;
    }
}


