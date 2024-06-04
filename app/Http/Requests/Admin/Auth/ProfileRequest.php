<?php

namespace App\Http\Requests\Admin\Auth;

use App\Base\Request\Web\AdminBaseRequest;

class ProfileRequest extends AdminBaseRequest
{
    public function rules()
    {
        return [
            'full_name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:100',
            'country_code' => 'nullable|string|max:5',
            'phone' => 'nullable|string|max:20',
            'old_password' => 'nullable|required_if:new_password,!null|string|max:100',
            'new_password' => 'nullable|string|confirmed|max:100',
        ];
    }
}
