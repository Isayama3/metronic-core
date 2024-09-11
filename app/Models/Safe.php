<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Safe extends BaseModel
{
    public function transactions()
    {
        return $this->hasMany(SafeTransaction::class);
    }
}
