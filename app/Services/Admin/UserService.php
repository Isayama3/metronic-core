<?php

namespace App\Services\Admin;

use App\Base\Services\BaseService;
use App\Repositories\UserRepository;

class UserService extends BaseService
{
    protected UserRepository $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        parent::__construct($UserRepository);
        $this->UserRepository = $UserRepository;
    }
}
