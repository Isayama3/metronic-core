<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Status extends BaseModel
{
    protected $table = 'statuses';
    public $timestamps = true;

    protected $fillable = [
        'table_name',
        'name',
        'active',
    ];

    public function locales()
    {
        return $this->hasMany(StatusLocale::class);
    }
}
