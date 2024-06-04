<?php

namespace App\Models;

use App\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;

class VehicleVerification extends BaseModel
{
    protected $table = 'vehicle_verification';
    public $timestamps = true;

    protected $fillable = [
        'license_front_image',
        'license_back_image',
        'license_status_id',
        'vehicle_id',
    ];

    protected $casts = [
        'license' => 'boolean'
    ];

    public function getLicenseFrontImageUrlAttribute(): string
    {
        return $this->getImageUrl('license_front_image');
    }

    public function getLicenseBackImageUrlAttribute(): string
    {
        return $this->getImageUrl('license_back_image');
    }

    public function licenseStatus()
    {
        return $this->belongsTo(Status::class, 'license_status_id');
    }
}
