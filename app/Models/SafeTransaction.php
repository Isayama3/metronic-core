<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class SafeTransaction extends BaseModel 
{
    protected $table = 'safe_transactions';
    public $timestamps = true;

    protected $fillable = [
        'safe_id',
        'amount',
        'type',
        'receipt',
        'bank_account_id',
    ];

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

}