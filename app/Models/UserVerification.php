<?php

namespace App\Models;

use App\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserVerification extends BaseModel
{
    protected $table = 'user_verifications';
    public $timestamps = true;

    protected $fillable = [
        'email_status_id',
        'phone_status_id',
        'national_id_card_status_id',
        'driving_license_status_id',
        'national_id_card_front_image',
        'national_id_card_back_image',
        'driving_license_back_image',
        'driving_license_front_image',
        'user_id',
    ];

    protected $casts = [
        'email' => 'boolean',
        'phone' => 'boolean',
        'national_id_card' => 'boolean',
        'driving_license' => 'boolean',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNationalIdCardFrontImageUrlAttribute(): string
    {
        return $this->getImageUrl('national_id_card_front_image');
    }

    public function getNationalIdCardBackImageUrlAttribute(): string
    {
        return $this->getImageUrl('national_id_card_back_image');
    }

    public function getDrivingLicenseBackImageUrlAttribute(): string
    {
        return $this->getImageUrl('driving_license_back_image');
    }

    public function getDrivingLicenseFrontImageUrlAttribute(): string
    {
        return $this->getImageUrl('driving_license_front_image');
    }

    public function emailStatus()
    {
        return $this->belongsTo(Status::class, 'email_status_id');
    }

    public function phoneStatus()
    {
        return $this->belongsTo(Status::class, 'phone_status_id');
    }

    public function nationalIdCardStatus()
    {
        return $this->belongsTo(Status::class, 'national_id_card_status_id');
    }

    public function drivingLicenseStatus()
    {
        return $this->belongsTo(Status::class, 'driving_license_status_id');
    }
}
