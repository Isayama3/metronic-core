<?php

namespace App\Models;

use App\Base\Models\BaseModel;

class PaymentMethod extends BaseModel 
{

    protected $table = 'payment_methods';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'active',
    ];

}