<?php

namespace App\Http\Requests\User;

use App\Base\Request\Api\UserBaseRequest;

class ContactUsRequest extends UserBaseRequest
{
    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'full_name' => 'required|string|max:255',
                        'email' => 'required|email|max:255',
                        'message' => 'required|string|max:255',
                    ];
                }
            case 'PUT': {
                    return [];
                }
        }
    }
}
