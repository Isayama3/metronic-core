<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class RideRequest extends BaseModel
{
    protected $table = 'ride_requests';
    public $timestamps = true;

    protected $fillable = [
        'ride_id',
        'user_id',
        'price',
        'status_id',
        'payment_method_id',
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
