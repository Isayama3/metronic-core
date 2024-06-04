<?php

namespace App\Http\Requests\Admin\Auth;

use App\Base\Request\Api\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "email" => "required|email|exists:admins,email",
            'password' => "required",
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'email.exists' => '.',
    //     ];
    // }
}
