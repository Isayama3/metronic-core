<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Country extends BaseModel 
{
    protected $table = 'countries';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'capitalized_name',
        'iso',
        'iso3',
        'num_code',
        'phone_code',
    ];
}