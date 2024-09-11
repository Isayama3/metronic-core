<?php

namespace App\Http\Controllers\User\Message;

use App\Base\Controllers\BaseApiController;
use App\Http\Requests\User\MessageRequest as FormRequest;
use App\Base\Models\Message as Model;
use App\Base\Resources\MessageResource as Resource;
use App\Services\MessageService as Service;

class MessageController extends BaseApiController
{
    protected $MessageService;

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

        $this->MessageService = $service;
        $this->MessageService->setIndexRelations([]);
        $this->MessageService->setOneItemRelations([]);
        $this->MessageService->setCustomWhen($this->customWhen());
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
