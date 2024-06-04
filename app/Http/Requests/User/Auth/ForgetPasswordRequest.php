<?php

namespace App\Http\Requests\User\Auth;

use App\Base\Request\Api\BaseRequest;

class ForgetPasswordRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'country_code' => 'required|numeric|exists:countries,phone_code',
            'phone' => 'required|numeric|exists:users|max_digits:20',
        ];
    }
}
