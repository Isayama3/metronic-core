<?php

namespace App\Http\Controllers\Admin\User;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\UserRequest as FormRequest;
use App\Models\User as Model;
use App\Services\Admin\UserService as Service;

class UserController extends BaseWebController
{
    protected $UserService;

    public function __construct(
        FormRequest $request,
        Model $model,
        Service $service,
    ) {
        parent::__construct(
            $request,
            $model,
            $service,
            view_path: 'admin.users.',
            hasCreate: false,
            hasEdit: false,
            hasDelete: false,
            storePermission: 'admin.users.store',
            showPermission: 'admin.users.show',
            updatePermission: 'admin.users.update',
            destroyPermission: 'admin.users.destroy',
        );

        $this->UserService = $service;
        $this->UserService->setIndexRelations([]);
        $this->UserService->setOneItemRelations(['ride_requests', 'ride_requests.ride', 'wallet']);
        $this->UserService->setCustomWhen($this->customWhen());
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
