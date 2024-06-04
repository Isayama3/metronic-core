<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Otp extends BaseModel
{
    protected $table = 'otps';
    public $timestamps = true;

    protected $fillable = [
        'otp',
        'country_code',
        'phone',
        'email',
        'expired_at',
    ];
}
