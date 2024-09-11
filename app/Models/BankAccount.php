<?php

namespace App\Models;

use App\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends BaseModel
{
    use SoftDeletes;
    public function transactions()
    {
        return $this->hasMany(BankAccountTransaction::class);
    }
}
