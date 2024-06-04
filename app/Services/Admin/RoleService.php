<?php

namespace App\Services\Admin;

use App\Base\Services\BaseService;
use App\Repositories\RoleRepository;

class RoleService extends BaseService
{
    protected RoleRepository $RoleRepository;

    public function __construct(RoleRepository $RoleRepository)
    {
        parent::__construct($RoleRepository);
        $this->RoleRepository = $RoleRepository;
    }

    public function store($data)
    {
        $record = parent::store($data);
        $record->permissions()->attach($data['permissions']);
    }

    public function update($id, $data)
    {
        $record = parent::update($id, $data);
        if(isset($data['permissions']) && !empty($data['permissions'])) {
            $record->permissions()->sync($data['permissions']);
        }
    }
}
