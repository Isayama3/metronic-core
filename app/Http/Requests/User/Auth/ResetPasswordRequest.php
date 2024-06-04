<?php

namespace App\Http\Requests\User\Auth;

use App\Base\Request\Api\UserBaseRequest;

class ResetPasswordRequest extends UserBaseRequest
{
    public function rules(): array
    {
        return [
            'password' => 'required|min:6|max:255',
        ];
    }
}
