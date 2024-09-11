<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\Transaction;

class TransactionRepository extends BaseRepository
{
     /**
     * TransactionRepository constructor.
     * @param Transaction $model
     */
    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }

}


