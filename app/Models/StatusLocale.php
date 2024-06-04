<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class StatusLocale extends BaseModel 
{
    protected $table = 'status_locales';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'status_id',
        'language_id',
    ];

}