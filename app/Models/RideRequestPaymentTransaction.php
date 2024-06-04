<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class RideRequestPaymentTransaction extends BaseModel 
{
    protected $table = 'ride_request_payment_transactions';
    public $timestamps = true;

    protected $fillable = [
        'ride_request_id',
        'status_id',
        'amount',
        'payment_gateway_id',
    ];

    public function paymentGateway()
    {
        return $this->hasOne(PaymentGateway::class);
    }

}