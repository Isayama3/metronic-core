<?php

namespace App\Http\Requests\Global\Api;

use App\Base\Request\Api\BaseRequest;

class VerifyOTPRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'country_code' => 'nullable|required_without_all:email|numeric|exists:countries,phone_code',
            'phone' => 'nullable|required_without_all:email|numeric|max_digits:20|exists:users,phone',
            'email' => 'nullable|required_without_all:phone,country_code|email|max:255|exists:users,email',
            'otp' => 'required|numeric|digits:4',
        ];
    }
}
