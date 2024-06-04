<?php

namespace App\Models;

use App\Base\Models\BaseModel;
class WalletTransaction extends BaseModel
{
    protected $table = 'wallet_transactions';
    public $timestamps = true;
    
    protected $fillable = [
        'wallet_id',
        'ride_id',
        'amount',
        'status_id',
        'type_id',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
