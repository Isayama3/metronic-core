<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\Role;

class RoleRepository extends BaseRepository
{
     /**
     * RoleRepository constructor.
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

}


