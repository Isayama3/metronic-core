<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\ContactUsRepository;

class ContactUsService extends BaseService
{
    protected ContactUsRepository $ContactUsRepository;

    public function __construct(ContactUsRepository $ContactUsRepository)
    {
        parent::__construct($ContactUsRepository);
        $this->ContactUsRepository = $ContactUsRepository;
    }
}


