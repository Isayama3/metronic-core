<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\RideReviewRepository;

class RideReviewService extends BaseService
{
    protected RideReviewRepository $RideReviewRepository;

    public function __construct(RideReviewRepository $RideReviewRepository)
    {
        parent::__construct($RideReviewRepository);
        $this->RideReviewRepository = $RideReviewRepository;
    }
}


