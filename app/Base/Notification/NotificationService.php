<?php

namespace App\Base\Notification;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class NotificationService
{
    /**
     * @var array
     */
    protected array $notificationChannels = [];

    /**
     * @var NotificationRepository
     */
    private NotificationRepository $notificationRepository;

    /**
     * NotificationService constructor.
     *
     * @param NotificationRepository $notificationRepository
     */
    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Add notification channel
     *
     * @param string $name
     * @param INotificationChannel $channel
     * @return void
     */
    public function addChannel(string $name, INotificationChannel $channel): void
    {
        $this->notificationChannels[$name] = $channel;
    }

    /**
     * Send notification
     *
     * @param string $channelName
     * @param string $token
     * @param Model|Authenticatable $user
     * @param string $title
     * @param string $body
     * @param string|null $icon_path
     * @return void
     */
    public function send(string $channelName, string|null $token, Model|Authenticatable $user, string $title, string $body, string $icon_path = null, string|null $target_type, int|null $target_id): void
    {
        $this->validateChannel($channelName);
        $this->sendNotification($channelName, $token, $title, $body, $icon_path);
        $this->notificationRepository->save($channelName, $user, $title, $body, $icon_path, $target_type, $target_id);
    }

    /**
     * Validate channel
     *
     * @param string $channelName
     * @return void
     */
    protected function validateChannel(string $channelName): void
    {
        if (!isset($this->notificationChannels[$channelName])) {
            throw new \InvalidArgumentException("Invalid notification channel: $channelName");
        }
    }

    /**
     * Send notification
     *
     * @param string $channelName
     * @param string|null $token
     * @param string $title
     * @param string $body
     * @param string|null $icon_path
     * @return mixed
     */
    protected function sendNotification(
        string $channelName,
        string|null $token,
        string $title,
        string $body,
        string $icon_path = null,
        string|null $target_type = null,
        int|null $target_id = null
    ): mixed {
        return $token !== null ? $this->notificationChannels[$channelName]->send(
            token: $token,
            title: $title,
            body: $body,
            icon_path: $icon_path,
            target_type: $target_type,
            target_id: $target_id
        ) : null;
    }
}
