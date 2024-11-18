<?php

namespace App\Base\WebSocket\Interfaces;

interface IEventFactory
{
    /**
     * Get an event by its type.
     *
     * @param string $event
     * @return mixed|null
     */
    public function getEvent(string $event);
}
