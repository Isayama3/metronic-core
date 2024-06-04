<?php

namespace App\Http\Controllers\Admin\Role;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\RoleRequest as FormRequest;
use App\Models\Role as Model;
use App\Services\Admin\RoleService as Service;

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
            hasDelete: true,
            view_path: 'admin.roles.'
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
