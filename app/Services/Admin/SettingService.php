<?php

namespace App\Services\Admin;

use App\Base\Services\BaseService;
use App\Repositories\SettingRepository;

class SettingService extends BaseService
{
    protected SettingRepository $SettingRepository;

    public function __construct(SettingRepository $SettingRepository)
    {
        parent::__construct($SettingRepository);
        $this->SettingRepository = $SettingRepository;
    }

    public function whereKey($key)
    {
        return $this->SettingRepository->whereKey($key);
    }

    public function updateManyByKey($data, $key)
    {
        return $this->SettingRepository->updateManyByKey($data, $key);
    }

    public function updateMainConfig($data)
    {
        return $this->SettingRepository->updateMainConfig($data);
    }
}
