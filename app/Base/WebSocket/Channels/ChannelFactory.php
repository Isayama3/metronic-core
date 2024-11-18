<?php
namespace App\Base\WebSocket\Channels;

use App\Base\WebSocket\Channels\Channel;
use App\Base\WebSocket\Channels\ChatChannel;
use App\Base\WebSocket\Channels\DriversChannel;
use App\Base\WebSocket\Channels\RideChannel;
use App\Base\WebSocket\Channels\RideRequestChannel;
use App\Base\WebSocket\Interfaces\IChannelFactory;

class ChannelFactory implements IChannelFactory
{
    protected $channels = [];

    public function __construct()
    {
        $this->loadChannels();
    }

    private function loadChannels()
    {
        $channels_classes = [
            'chat' => ChatChannel::class,
            'drivers' => DriversChannel::class,
            'ride' => RideChannel::class,
            'ride_request' => RideRequestChannel::class,
            // Add new channels here
        ];

        foreach ($channels_classes as $type => $class) {
            if (is_subclass_of($class, Channel::class)) {
                $this->channels[$type] = $class;
            }
        }
    }

    public function getChannel(string $channelType)
    {
        if (isset($this->channels[$channelType])) {
            // Resolve the event class using the service container
            return app()->make($this->channels[$channelType]);
        }
    }
}
