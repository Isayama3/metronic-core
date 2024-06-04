<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\AdminRequest as FormRequest;
use App\Models\Admin as Model;
use App\Services\Admin\AdminService as Service;

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
            hasDelete: true,
            hasShow: false,
            hasCreate: true,
            hasEdit: true,
            view_path: 'admin.admins.'
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
                $q->whereNotIn('id', [1]);
            },
        ];
    }
}
