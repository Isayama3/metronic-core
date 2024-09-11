<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Wallet extends BaseModel
{
    protected $casts = [
        'wallet_balance' => 'double',
        'withdraw_money' => 'double',
        'to_be_deposit' => 'double',
        'deposited_money' => 'double',
        'trip_used_money' => 'double',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(WalletTransaction::class);
    }
}
