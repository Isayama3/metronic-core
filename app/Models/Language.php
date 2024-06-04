<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Language extends BaseModel
{
    protected $table = 'languages';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'active',
    ];
}
