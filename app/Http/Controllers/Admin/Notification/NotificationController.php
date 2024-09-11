<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\NotificationRequest as FormRequest;
use App\Base\Models\Notification as Model;
use App\Services\NotificationService as Service;

class NotificationController extends BaseWebController
{
    protected $NotificationService;
    
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
            view_path: 'admin.Notification.'
        );
        
        $this->NotificationService = $service;
        $this->NotificationService->setIndexRelations([]);
        $this->NotificationService->setOneItemRelations([]);
        $this->NotificationService->setCustomWhen($this->customWhen());
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
