<?php

namespace App\Enums;

use App\Base\Traits\Custom\EnumCustom;

enum UserVerificationStatus: int
{
    use EnumCustom;
    case REVIEWING    = 7;
    case VERIFIED   = 8;
    case UNVERIFIED   = 9;
    case REJECTED   = 10;
}
