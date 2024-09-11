<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\VehicleModelRepository;

class VehicleModelService extends BaseService
{
    protected VehicleModelRepository $VehicleModelRepository;

    public function __construct(VehicleModelRepository $VehicleModelRepository)
    {
        parent::__construct($VehicleModelRepository);
        $this->VehicleModelRepository = $VehicleModelRepository;
    }
}


