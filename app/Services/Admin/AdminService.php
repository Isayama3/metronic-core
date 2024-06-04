<?php

namespace App\Services\Admin;

use App\Base\Services\BaseService;
use App\Repositories\AdminRepository;

class AdminService extends BaseService
{
    protected AdminRepository $AdminRepository;

    public function __construct(AdminRepository $AdminRepository)
    {
        parent::__construct($AdminRepository);
        $this->AdminRepository = $AdminRepository;
    }
}
