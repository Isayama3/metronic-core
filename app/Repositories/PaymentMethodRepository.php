<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\PaymentMethod;

class PaymentMethodRepository extends BaseRepository
{
     /**
     * PaymentMethodRepository constructor.
     * @param PaymentMethod $model
     */
    public function __construct(PaymentMethod $model)
    {
        parent::__construct($model);
    }

}


