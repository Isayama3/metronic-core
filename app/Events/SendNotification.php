<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string|null $token;
    public string $title;
    public string $body;
    public string|null $icon_path;
    public Model|Authenticatable $user;
    public string|null $target_type;
    public int|null $target_id;

    /**
     * Create a new event instance.
     *
     * @param string $title
     * @param string $body
     * @param string $icon_path
     * @param Model|Authenticatable $user
     * @param string|null $target_type
     * @param int|null $target_id
     */
    public function __construct(Model|Authenticatable $user, string $title, string $body, string|null $icon_path = null, string|null $target_type = null, int|null $target_id = null)
    {
        
        $this->token = $user?->fcm_token ?? null;
        $this->title = $title;
        $this->body = $body;
        $this->icon_path = $icon_path;
        $this->user = $user;
        $this->target_type = $target_type;
        $this->target_id = $target_id;
    }
}
