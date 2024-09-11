<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\LanguageRepository;

class LanguageService extends BaseService
{
    protected LanguageRepository $LanguageRepository;

    public function __construct(LanguageRepository $LanguageRepository)
    {
        parent::__construct($LanguageRepository);
        $this->LanguageRepository = $LanguageRepository;
    }
}


