<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\PaymentMethodRepository;

class PaymentMethodService extends BaseService
{
    protected PaymentMethodRepository $PaymentMethodRepository;

    public function __construct(PaymentMethodRepository $PaymentMethodRepository)
    {
        parent::__construct($PaymentMethodRepository);
        $this->PaymentMethodRepository = $PaymentMethodRepository;
    }
}


