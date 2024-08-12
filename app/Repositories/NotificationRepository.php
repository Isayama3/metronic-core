<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Base\Models\Notification;

class NotificationRepository extends BaseRepository
{
     /**
     * NotificationRepository constructor.
     * @param Notification $model
     */
    public function __construct(Notification $model)
    {
        parent::__construct($model);
    }

}


