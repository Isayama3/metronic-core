<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\ReportReasonRepository;

class ReportReasonService extends BaseService
{
    protected ReportReasonRepository $ReportReasonRepository;

    public function __construct(ReportReasonRepository $ReportReasonRepository)
    {
        parent::__construct($ReportReasonRepository);
        $this->ReportReasonRepository = $ReportReasonRepository;
    }
}


