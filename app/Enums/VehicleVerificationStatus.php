<?php

namespace App\Enums;

use App\Base\Traits\Custom\EnumCustom;

enum VehicleVerificationStatus: int
{
    use EnumCustom;
    case REVIEWING    = 11;
    case VERIFIED   = 12;
    case UNVERIFIED   = 13;
    case REJECTED   = 14;
}
