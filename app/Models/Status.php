<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Status extends BaseModel
{
    public function locales()
    {
        return $this->hasMany(StatusLocale::class);
    }
}
