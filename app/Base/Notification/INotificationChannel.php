<?php

namespace App\Base\Notification;

interface INotificationChannel
{
    /**
     * Send notification
     *
     * @param string $token
     * @param string $title
     * @param string $body
     * @param string|null $icon_path
     * @return void
     */
    public function send(
        string $token,
        string $title,
        string $body,
        string|null $icon_path = null,
        string|null $target_type,
        int|null $target_id
    ): void;
}
