<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class RideStopover extends BaseModel
{
    protected $table = 'ride_stopovers';
    public $timestamps = true;

    protected $fillable = [
        'ride_id',
        'latitude',
        'longitude',
        'name',
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }
}
