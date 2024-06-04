<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Safe extends BaseModel
{

    protected $table = 'safes';
    public $timestamps = true;

    protected $fillable = [
        'admin_id',
        'money_in',
        'money_out',
        'balance',
        'maximum_balance',
    ];


    public function transaction()
    {
        return $this->hasMany(SafeTransaction::class);
    }
}
