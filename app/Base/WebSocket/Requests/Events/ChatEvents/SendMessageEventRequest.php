<?php

namespace App\Base\WebSocket\Requests\Events\ChatEvents;

use App\Base\WebSocket\Requests\RequestValidation;

class SendMessageEventRequest extends RequestValidation
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
            'message' => [
                'required' => true,
                'string' => true
            ],
        ];
    }
}
