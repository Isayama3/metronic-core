<?php

namespace App\Services\Admin;

use App\Base\Services\BaseService;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\DB;

class AdminService extends BaseService
{
    protected AdminRepository $AdminRepository;

    public function __construct(AdminRepository $AdminRepository)
    {
        parent::__construct($AdminRepository);
        $this->AdminRepository = $AdminRepository;
    }

    public function store($data)
    {
        $record = parent::store($data);

        if (isset($data['roles']))
            $record->assignRole($data['roles']);

        return $record;
    }

    public function update($id, $data)
    {
        $record = parent::update($id, $data);

        if (isset($data['roles']))
            $record->syncRoles($data['roles']);

        return $record;
    }

    public function destroy($id)
    {
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        return parent::destroy($id);
    }
}
