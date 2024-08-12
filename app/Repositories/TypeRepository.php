<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\Type;

class TypeRepository extends BaseRepository
{
     /**
     * TypeRepository constructor.
     * @param Type $model
     */
    public function __construct(Type $model)
    {
        parent::__construct($model);
    }

    

}


