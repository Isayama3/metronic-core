<?php
namespace App\Base\WebSocket\Events;

use App\Base\WebSocket\Events\ChatEvents\SendMessageEvent;
use App\Base\WebSocket\Events\DriverEvents\AcceptRide;
use App\Base\WebSocket\Events\DriverEvents\RejectRide;
use App\Base\WebSocket\Events\DriverEvents\SetDriverData;
use App\Base\WebSocket\Events\Event;
use App\Base\WebSocket\Events\RideRequestEvents\InitRideRequest;
use App\Base\WebSocket\Events\SubscribeEvents\SubscribeEvent;
use App\Base\WebSocket\Interfaces\IEventFactory;

class EventFactory implements IEventFactory
{
    protected $events = [];

    public function __construct()
    {
        $this->loadEvents();
    }

    private function loadEvents()
    {
        $events_classes = [
            'subscribe' => SubscribeEvent::class,
            'send_message' => SendMessageEvent::class,
            'set_driver_data' => SetDriverData::class,
            'accept_ride' => AcceptRide::class,
            'reject_ride' => RejectRide::class,
            'init_ride_request' => InitRideRequest::class,
            // Add new events here
        ];

        foreach ($events_classes as $type => $class) {
            if (is_subclass_of($class, Event::class)) {
                $this->events[$type] = $class;
            }
        }
    }

    public function getEvent(string $event)
    {
        if (isset($this->events[$event])) {
            // Resolve the event class using the service container
            return app()->make($this->events[$event]);
        }

        return null;
    }
}
