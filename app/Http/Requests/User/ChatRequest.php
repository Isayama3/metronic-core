<?php

namespace App\Http\Requests\User;

use App\Base\Request\Api\UserBaseRequest;
use App\Models\User;

class ChatRequest extends UserBaseRequest
{
    public function prepareForValidation(): void
    {
        $this->merge([
            'sender_id' => auth('user-api')->id(),
            'sender_type' => User::class,
            'receiver_type' => User::class,
        ]);
    }

    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'sender_id' => 'required|integer|exists:users,id',
                        'sender_type' => 'required|string',
                        'receiver_id' => 'required|integer|exists:users,id',
                        'receiver_type' => 'required|string',
                        'message' => 'required|string',
                    ];
                }
            case 'PUT': {
                    return [];
                }
        }
    }
}
