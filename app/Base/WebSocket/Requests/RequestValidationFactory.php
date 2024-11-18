<?php
namespace App\Base\WebSocket\Requests;

use App\Base\WebSocket\Interfaces\IRequestValidationFactory;
use App\Base\WebSocket\Requests\Events\ChatEvents\SendMessageEventRequest;
use App\Base\WebSocket\Requests\Events\DriverEvents\AcceptRideRequest;
use App\Base\WebSocket\Requests\Events\DriverEvents\RejectRideRequest;
use App\Base\WebSocket\Requests\Events\DriverEvents\SetDriverDataRequest;
use App\Base\WebSocket\Requests\Events\RideRequestEvents\InitRideRequestRequest;
use App\Base\WebSocket\Requests\Events\SubscribeEvents\SubscribeEventRequest;

class RequestValidationFactory implements IRequestValidationFactory
{
    protected $events_request_validations = [];

    public function __construct()
    {
        $this->loadRequestValidation();
    }

    private function loadRequestValidation()
    {
        $events_request_validations = [
            'subscribe' => SubscribeEventRequest::class,
            'send_message' => SendMessageEventRequest::class,
            'set_driver_data' => SetDriverDataRequest::class,
            'accept_ride' => AcceptRideRequest::class,
            'reject_ride' => RejectRideRequest::class,
            'init_ride_request' => InitRideRequestRequest::class,
            // Add new events here
        ];

        foreach ($events_request_validations as $event => $class) {
            if (is_subclass_of($class, RequestValidation::class)) {
                $this->events_request_validations[$event] = $class;
            }
        }
    }

    public function getEventRequestValidation(string $event_request_validation)
    {
        if (isset($this->events_request_validations[$event_request_validation])) {
            // Resolve the event_request class using the service container
            return app()->make($this->events_request_validations[$event_request_validation]);
        }

        return null;
    }
}
