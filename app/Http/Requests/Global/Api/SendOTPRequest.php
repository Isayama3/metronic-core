<?php

namespace App\Http\Requests\Global\Api;

use App\Base\Request\Api\BaseRequest;

class SendOTPRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'country_code' => 'nullable|required_without_all:email|numeric|exists:countries,phone_code',
            'phone' => 'nullable|required_without_all:email|numeric|max_digits:20',
            'email' => 'nullable|required_without_all:phone,country_code|email|max:255',
        ];
    }
}
