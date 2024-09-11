<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\ReportRepository;

class ReportService extends BaseService
{
    protected ReportRepository $ReportRepository;

    public function __construct(ReportRepository $ReportRepository)
    {
        parent::__construct($ReportRepository);
        $this->ReportRepository = $ReportRepository;
    }
}


