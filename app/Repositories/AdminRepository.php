<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\Admin;

class AdminRepository extends BaseRepository
{
    /**
     * AdminRepository constructor.
     * @param Admin $model
     */
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }
}
