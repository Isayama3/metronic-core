<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\AdminRequest as FormRequest;
use App\Models\Admin as Model;
use App\Services\AdminService as Service;

class AdminController extends BaseWebController
{
    protected $AdminService;

    public function __construct(
        FormRequest $request,
        Model $model,
        Service $service,
    ) {
        parent::__construct(
            $request,
            $model,
            $service,
            view_path: 'admin.admins.',
            hasShow: false,
            storePermission: 'admin.admins.store',
            showPermission: 'admin.admins.show',
            updatePermission: 'admin.admins.update',
            destroyPermission: 'admin.admins.destroy',
        );

        $this->AdminService = $service;
        $this->AdminService->setIndexRelations([]);
        $this->AdminService->setOneItemRelations([]);
        $this->AdminService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => true,
            'callback' => function ($q) {
                $q->whereNotIn('id', [1])->whereHas('roles', function ($q) {
                    $q->where('name', '!=', 'agent');
                });
            },
        ];
    }
}
