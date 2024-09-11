<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class WalletTransaction extends BaseModel
{
    protected $table = 'wallet_transactions';
    public $timestamps = true;

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function rideRequest()
    {
        return $this->belongsTo(RideRequest::class);
    }

    public function agent()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
