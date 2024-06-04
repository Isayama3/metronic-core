<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Vehicle extends BaseModel
{
    protected $table = 'vehicles';
    public $timestamps = true;

    protected $fillable = [
        'plate_number',
        'vehicle_name',
        'image',
        'color',
        'vehicle_model_id',
        'active',
        'user_id',
        'vehicle_type_id',
    ];

    public function model()
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'vehicle_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function verifications()
    {
        return $this->hasOne(VehicleVerification::class, 'vehicle_id');
    }
}
