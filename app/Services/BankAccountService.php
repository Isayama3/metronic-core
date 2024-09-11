<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\BankAccountRepository;

class BankAccountService extends BaseService
{
    protected BankAccountRepository $BankAccountRepository;

    public function __construct(BankAccountRepository $BankAccountRepository)
    {
        parent::__construct($BankAccountRepository);
        $this->BankAccountRepository = $BankAccountRepository;
    }
}


