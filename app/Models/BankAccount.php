<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class BankAccount extends BaseModel
{

    protected $table = 'bank_accounts';
    public $timestamps = true;

    protected $fillable = [
        'account_number',
        'account_holder_name',
        'active',
        'bank_name',
        'admin_id',
    ];

    public function transactions()
    {
        return $this->hasMany(SafeTransaction::class);
    }
}
