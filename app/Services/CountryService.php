<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\CountryRepository;

class CountryService extends BaseService
{
    protected CountryRepository $CountryRepository;

    public function __construct(CountryRepository $CountryRepository)
    {
        parent::__construct($CountryRepository);
        $this->CountryRepository = $CountryRepository;
    }
}
