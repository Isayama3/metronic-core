<?php

namespace App\Base\WebSocket\Channels;

class ChatChannel extends Channel
{
    public function validate($data): bool
    {
        return isset($data->channel_id) && is_numeric($data->channel_id);
    }
}
