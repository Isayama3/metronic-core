<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\VehicleBrandRepository;

class VehicleBrandService extends BaseService
{
    protected VehicleBrandRepository $VehicleBrandRepository;

    public function __construct(VehicleBrandRepository $VehicleBrandRepository)
    {
        parent::__construct($VehicleBrandRepository);
        $this->VehicleBrandRepository = $VehicleBrandRepository;
    }
}


