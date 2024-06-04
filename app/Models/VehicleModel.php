<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class VehicleModel extends BaseModel 
{
    protected $table = 'vehicle_models';
    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

}