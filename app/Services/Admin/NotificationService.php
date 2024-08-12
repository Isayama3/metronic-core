<?php

namespace App\Services\Admin;

use App\Base\Services\BaseService;
use App\Repositories\NotificationRepository;

class NotificationService extends BaseService
{
    protected NotificationRepository $NotificationRepository;

    public function __construct(NotificationRepository $NotificationRepository)
    {
        parent::__construct($NotificationRepository);
        $this->NotificationRepository = $NotificationRepository;
    }
}


