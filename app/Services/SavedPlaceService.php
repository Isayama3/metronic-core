<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\SavedPlaceRepository;

class SavedPlaceService extends BaseService
{
    protected SavedPlaceRepository $SavedPlaceRepository;

    public function __construct(SavedPlaceRepository $SavedPlaceRepository)
    {
        parent::__construct($SavedPlaceRepository);
        $this->SavedPlaceRepository = $SavedPlaceRepository;
    }
}
