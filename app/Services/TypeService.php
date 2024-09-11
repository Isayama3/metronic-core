<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\TypeRepository;

class TypeService extends BaseService
{
    protected TypeRepository $TypeRepository;

    public function __construct(TypeRepository $TypeRepository)
    {
        parent::__construct($TypeRepository);
        $this->TypeRepository = $TypeRepository;
    }
}


