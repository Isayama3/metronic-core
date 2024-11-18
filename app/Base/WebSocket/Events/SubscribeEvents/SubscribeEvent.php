<?php

namespace App\Base\WebSocket\Events\SubscribeEvents;

use App\Base\WebSocket\Channels\Channel;

use App\Base\WebSocket\Events\Event;
use App\Base\WebSocket\Interfaces\IAuthService;

use App\Base\WebSocket\Interfaces\IChannelFactory;
use App\Base\WebSocket\WebSocketServiceManager;
use Ratchet\ConnectionInterface;

class SubscribeEvent extends Event
{
    private WebSocketServiceManager $webSocketServiceManager;
    private IAuthService $authService;
    private IChannelFactory $channelFactory;

    public function __construct(
        WebSocketServiceManager $webSocketServiceManager,
        IAuthService $authService,
        IChannelFactory $channelFactory
    ) {
        $this->webSocketServiceManager = $webSocketServiceManager;
        $this->authService = $authService;
        $this->channelFactory = $channelFactory;
    }

    public function execute(ConnectionInterface $conn, $data)
    {
        if (!$this->isAuthenticated($conn, $data)) {
            return;
        }

        $channel = $this->channelFactory->getChannel($data->channel_name);

        if (!$channel || !$channel->validate($data)) {
            $conn->send(json_encode(['error' => "Invalid or unauthorized subscription details"]));
            return;
        }

        $channel->subscribe($conn, $data);

        $this->storeSubscription($conn, $data, $channel);
    }

    private function isAuthenticated(ConnectionInterface $conn, $data): bool
    {
        if (!isset($data->auth_token, $data->user_type)) {
            $conn->send(json_encode(['error' => "Authentication required"]));
            return false;
        }

        $dbAuthUser = $this->authService->authenticateUser($data->auth_token, $data->user_type);
        if (!$dbAuthUser) {
            $conn->send(json_encode(['error' => "Invalid or expired token"]));
            return false;
        }

        $this->webSocketServiceManager->getUserManager()->setDBAuthUser($conn->resourceId, $dbAuthUser);
        return true;
    }

    private function storeSubscription(ConnectionInterface $conn, $data, Channel $channel)
    {
        $this->webSocketServiceManager->getSubscriptionManager()->setSubscriptionsChannels($conn->resourceId, [
            'channel_id' => $data->channel_id,
            'channel_name' => $data->channel_name,
        ]);

        $this->webSocketServiceManager->getUserManager()->setWebSocketUser($conn->resourceId, $conn);
    }
}
