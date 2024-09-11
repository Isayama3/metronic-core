<?php

namespace App\Http\Controllers\User\Notification;

use App\Base\Controllers\BaseApiController;
use App\Http\Requests\User\NotificationRequest as FormRequest;
use App\Base\Models\Notification as Model;
use App\Base\Resources\NotificationResource as Resource;
use App\Services\NotificationService as Service;

class NotificationController extends BaseApiController
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
            new Resource($model),
            $service,
            hasDelete: false,
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
