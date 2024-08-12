<?php

namespace App\Base\Notification;

use App\Base\Services\FirebaseHandler;

class FCMService implements INotificationChannel
{
    /**
     * Send notification
     *
     * @param string $token
     * @param string $title
     * @param string $body
     * @param string|null $icon_path
     * @param string|null $target_type
     * @param int|null $target_id
     * @return void
     */
    public function send(
        string $token,
        string $title,
        string $body,
        string|null $icon_path = null,
        string|null $target_type = null,
        int|null $target_id = null
    ): void {
        (new FirebaseHandler())->send(
            tokens: [$token],
            title: $title,
            body: $body,
            icon_path: $icon_path,
            target_type: $target_type,
            target_id: $target_id
        );
    }
}
