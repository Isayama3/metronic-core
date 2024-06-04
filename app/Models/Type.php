<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Type extends BaseModel 
{
    protected $table = 'types';
    public $timestamps = true;

    protected $fillable = [
        'table_name',
        'name',
        'active',
    ];

    public function locales()
    {
        return $this->hasMany(TypeLocale::class);
    }

}