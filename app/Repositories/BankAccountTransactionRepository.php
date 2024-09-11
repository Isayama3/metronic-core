<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\BankAccountTransaction;

class BankAccountTransactionRepository extends BaseRepository
{
     /**
     * BankAccountTransactionRepository constructor.
     * @param BankAccountTransaction $model
     */
    public function __construct(BankAccountTransaction $model)
    {
        parent::__construct($model);
    }

}


