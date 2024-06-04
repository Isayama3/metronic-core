<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Contact extends BaseModel
{
    protected $table = 'contacts';
    public $timestamps = true;

    protected $fillable = [
        'full_name',
        'email',
        'message',
    ];
}
