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
            hasDelete: false,
            hasCreate: false,
            hasEdit: false,
            view_path: 'admin.users.'
        );

        $this->UserService = $service;
        $this->UserService->setIndexRelations([]);
        $this->UserService->setOneItemRelations([]);
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
