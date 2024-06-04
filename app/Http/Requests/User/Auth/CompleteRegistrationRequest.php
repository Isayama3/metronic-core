<?php

namespace App\Http\Requests\User\Auth;

use App\Base\Request\Api\UserBaseRequest;

class CompleteRegistrationRequest extends UserBaseRequest
{
    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . auth('user-api')->id(),
            'password' => 'required|min:6|max:255',
        ];
    }
}
