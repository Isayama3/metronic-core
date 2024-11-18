<?php

namespace App\Base\WebSocket\Interfaces;

interface IRequestValidationFactory
{
    /**
     * Get an event_request_validation by its type.
     *
     * @param string $event_request_validation
     * @return mixed|null
     */
    public function getEventRequestValidation(string $event_request_validation);
}
