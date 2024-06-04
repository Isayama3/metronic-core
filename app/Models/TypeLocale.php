<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class TypeLocale extends BaseModel 
{
    protected $table = 'type_locales';
    public $timestamps = true;

    protected $fillable = [
        'type_id',
        'language_id',
        'name',
    ];
}