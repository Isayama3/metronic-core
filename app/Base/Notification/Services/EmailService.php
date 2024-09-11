<?php

namespace App\Base\Notification\Services;

use App\Base\Notification\INotificationChannel;
use App\Base\Services\FirebaseHandler;

class EmailService implements INotificationChannel
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
        array $users,
        string $title,
        string $body,
        string | null $icon_path = null,
        string | null $target_type = null,
        int | null $target_id = null
    ): void {
        // $emails = array_column($users, 'email');

        // (new EmailHandler())->send(
        //     emails: $emails,
        //     subject: $title,
        //     body: $body
        // );
    }
}
