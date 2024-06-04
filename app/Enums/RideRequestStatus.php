<?php

namespace App\Enums;

use App\Base\Traits\Custom\EnumCustom;

enum RideRequestStatus: int
{
    use EnumCustom;
    case PENDING    = 4;
    case ACCEPTED   = 5;
    case REJECTED   = 6;
}
