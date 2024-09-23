<?php

namespace App\Models;

use App\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends BaseModel
{
    use SoftDeletes;
}
