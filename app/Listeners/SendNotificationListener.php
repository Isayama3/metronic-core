<?php

namespace App\Listeners;

use App\Base\Notification\FCMService;
use App\Base\Notification\NotificationService;
use App\Base\Services\FirebaseHandler;
use App\Events\SendNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationListener implements ShouldQueue
{
    use InteractsWithQueue;

    protected FirebaseHandler $firebaseHandler;
    protected notificationService $notificationService;
    /**
     * Create the event listener.
     *
     * @param FirebaseHandler $firebaseHandler
     */
    public function __construct(FirebaseHandler $firebaseHandler, NotificationService $notificationService)
    {
        $this->firebaseHandler = $firebaseHandler;
        $this->notificationService = $notificationService;
    }

    /**
     * Handle the event.
     *
     * @param SendNotification $event
     * @return void
     */
    public function handle(SendNotification $event): void
    {
        $this->notificationService->addChannel('fcm', new FCMService());
        $this->notificationService->send(
            'fcm',
            $event->token,
            $event->user,
            $event->title,
            $event->body,
            $event->icon_path,
            $event->target_type,
            $event->target_id
        );
    }
}
