<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\VehicleModel;

class VehicleModelRepository extends BaseRepository
{
     /**
     * VehicleModelRepository constructor.
     * @param VehicleModel $model
     */
    public function __construct(VehicleModel $model)
    {
        parent::__construct($model);
    }

}


