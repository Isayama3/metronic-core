<?php

namespace App\Base\WebSocket\Events\ChatEvents;

use App\Base\WebSocket\Events\Event;
use App\Base\WebSocket\WebSocketServiceManager;
use Ratchet\ConnectionInterface;

class SendMessageEvent extends Event
{
    private $webSocketServiceManager;

    public function __construct(WebSocketServiceManager $webSocketServiceManager)
    {
        $this->webSocketServiceManager = $webSocketServiceManager;
    }

    public function execute(ConnectionInterface $conn, $data)
    {
        $subscriptions = $this->webSocketServiceManager->getSubscriptionManager()->getSubscriptionsChannels();
        $users = $this->webSocketServiceManager->getUserManager()->getWebSocketUsers();

        if (isset($subscriptions[$conn->resourceId])) {
            foreach ($subscriptions as $id => $channel_info) {
                if ($channel_info['channel_id'] == $data->channel_id && $id != $conn->resourceId) {
                    $users[$id]->send($this->sendSuccessResponse($data->event, $data));
                }
            }

            dump($data);
        } else {
            $conn->send(json_encode(['error' => 'You are not subscribed to any channel']));
        }
    }
}
