<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\RideStopoverRepository;

class RideStopoverService extends BaseService
{
    protected RideStopoverRepository $RideStopoverRepository;

    public function __construct(RideStopoverRepository $RideStopoverRepository)
    {
        parent::__construct($RideStopoverRepository);
        $this->RideStopoverRepository = $RideStopoverRepository;
    }
}


