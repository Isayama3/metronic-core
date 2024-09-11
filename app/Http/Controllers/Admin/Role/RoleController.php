<?php

namespace App\Http\Controllers\Admin\Role;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\RoleRequest as FormRequest;
use App\Models\Role as Model;
use App\Services\RoleService as Service;

class RoleController extends BaseWebController
{
    protected $RoleService;

    public function __construct(
        FormRequest $request,
        Model $model,
        Service $service,
    ) {
        parent::__construct(
            $request,
            $model,
            $service,
            view_path: 'admin.roles.',
            hasShow: false,
            storePermission: 'admin.roles.store',
            showPermission: 'admin.roles.show',
            updatePermission: 'admin.roles.update',
            destroyPermission: 'admin.roles.destroy',
        );

        $this->RoleService = $service;
        $this->RoleService->setIndexRelations([]);
        $this->RoleService->setOneItemRelations([]);
        $this->RoleService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => false,
            'callback' => function ($q) {
            },
        ];
    }
}
