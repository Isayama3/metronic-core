<?php

namespace App\Http\Requests\User\Auth;

use App\Base\Request\Api\BaseRequest;

class RegisterRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'country_code' => 'required|numeric|exists:countries,phone_code',
            'phone' => 'required|numeric|unique:users|max_digits:20',
            'fcm_token' => 'required|string',
        ];
    }
}
