<?php

namespace App\Base\Notification;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class NotificationRepository
{
    /**
     * Save notification to database
     *
     * @param string $channel_name
     * @param Model|Authenticatable $user
     * @param string $title
     * @param string $body
     * @param string|null $icon_path
     * @param string|null $target_type
     * @param int|null $target_id
     * @return void
     */

    public function save(string $channel_name, Model|Authenticatable $user, string $title, string $body, string $icon_path = null, string|null $target_type = null, int|null $target_id = null): void
    {
        $user->notifications()->create([
            'channel_name' => $channel_name,
            'title' => $title,
            'body' => $body,
            'icon_path' => $icon_path,
            'notifiable_target_type' => $target_type,
            'notifiable_target_id' => $target_id
        ]);
    }
}
