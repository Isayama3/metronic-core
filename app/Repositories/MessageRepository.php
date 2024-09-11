<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Base\Models\Message;

class MessageRepository extends BaseRepository
{
    /**
     * MessageRepository constructor.
     * @param Message $model
     */
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }
}
