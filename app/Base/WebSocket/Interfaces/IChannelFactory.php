<?php

namespace App\Base\WebSocket\Interfaces;

interface IChannelFactory
{
    /**
     * Get a channel by its type.
     *
     * @param string $channelType
     * @return mixed|null
     */
    public function getChannel(string $channelType);
}
