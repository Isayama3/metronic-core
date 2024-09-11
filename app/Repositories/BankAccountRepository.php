<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\BankAccount;

class BankAccountRepository extends BaseRepository
{
     /**
     * BankAccountRepository constructor.
     * @param BankAccount $model
     */
    public function __construct(BankAccount $model)
    {
        parent::__construct($model);
    }

}


