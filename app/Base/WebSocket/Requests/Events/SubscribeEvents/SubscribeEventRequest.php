<?php

namespace App\Base\WebSocket\Requests\Events\SubscribeEvents;

use App\Base\WebSocket\Requests\RequestValidation;

class SubscribeEventRequest extends RequestValidation
{
    public function rules(): array
    {
        return [
            'event' => [
                'required' => true,
                'string' => true
            ],
            'channel_id' => [
                'required' => true,
                'numeric' => true
            ],
            'channel_name' => [
                'required' => true,
                'string' => true
            ],
            "auth_token" => [
                'required' => true,
                'string' => true
            ],
            "user_type" => [
                'required' => true,
                'string' => true,
                'in' => ['customer', 'provider'],
            ]
        ];
    }
}
