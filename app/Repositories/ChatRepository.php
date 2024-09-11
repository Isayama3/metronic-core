<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Base\Models\Chat;

class ChatRepository extends BaseRepository
{
     /**
     * ChatRepository constructor.
     * @param Chat $model
     */
    public function __construct(Chat $model)
    {
        parent::__construct($model);
    }

}


