<?php

namespace App\Http\Requests\Admin;

use App\Base\Request\Web\AdminBaseRequest;

class MainConfigRequest extends AdminBaseRequest
{
    public function rules(): array
    {
        return [
            'ride_request_price_percentage' => 'required|numeric|min:1',
            'driver_wallet_max_balance' => 'required|numeric|min:1',
        ];
    }
}
