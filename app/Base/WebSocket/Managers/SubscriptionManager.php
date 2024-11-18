<?php

namespace App\Base\WebSocket\Managers;

use Ratchet\ConnectionInterface;
use App\Base\WebSocket\Managers\Interfaces\ISubscriptionManager;

class SubscriptionManager implements ISubscriptionManager
{
    private array $subscriptionChannels = [];

    public function getSubscriptionsChannels(): array
    {
        return $this->subscriptionChannels;
    }

   /**
     * @param int   $resourceId        The connection's unique ID.
     * @param array $subscription_data Subscription details: ['channel_id','channel_name']
     */
    public function setSubscriptionsChannels(int $resourceId, array $subscription_data): void
    {
        $this->subscriptionChannels[$resourceId] = $subscription_data;
    }

    public function getSubscriptionDrivers(): array
    {
        return array_filter($this->subscriptionChannels, function ($user) {
            return $user['channel_name'] === 'drivers';
        });
    }

    public function cleanup(ConnectionInterface $conn): void
    {
        unset($this->subscriptionChannels[$conn->resourceId]);
    }
}
