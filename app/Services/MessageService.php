<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\MessageRepository;

class MessageService extends BaseService
{
    protected MessageRepository $MessageRepository;

    public function __construct(MessageRepository $MessageRepository)
    {
        parent::__construct($MessageRepository);
        $this->MessageRepository = $MessageRepository;
    }
}


