<?php

namespace App\Http\Requests\User\Auth;

use App\Base\Request\Api\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'country_code' => 'required|numeric|exists:countries,phone_code',
            'phone' => 'required|numeric|max_digits:20',
            'password' => 'required|string|min:6|max:20',
            'fcm_token' => 'required|string',
        ];
    }
}
