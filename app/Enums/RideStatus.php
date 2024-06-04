<?php

namespace App\Enums;

use App\Base\Traits\Custom\EnumCustom;

enum RideStatus: int
{
    use EnumCustom;
    case PENDING    = 1;
    case COMPLETED  = 2;
    case CANCELED   = 3;
}
