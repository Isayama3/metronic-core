<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class PaymentGateway extends BaseModel 
{
    protected $table = 'payment_gateways';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'active',
        'total_transactions',
    ];

}