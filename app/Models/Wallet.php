<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class Wallet extends BaseModel
{
    protected $table = 'wallets';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'requested_balance',
        'wallet_balance',
        'checkout_balance',
        'maximum_balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
