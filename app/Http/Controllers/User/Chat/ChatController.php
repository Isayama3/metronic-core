<?php

namespace App\Http\Controllers\User\Chat;

use App\Base\Controllers\BaseApiController;
use App\Http\Requests\User\ChatRequest as FormRequest;
use App\Base\Models\Chat as Model;
use App\Base\Resources\ChatResource as Resource;
use App\Services\ChatService as Service;

class ChatController extends BaseApiController
{
    protected $ChatService;

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

        $this->ChatService = $service;
        $this->ChatService->setIndexRelations(['sender', 'receiver', 'messages']);
        $this->ChatService->setOneItemRelations(['sender', 'receiver', 'messages']);
        $this->ChatService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => true,
            'callback' => function ($q) {
                $q->where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id());
            },
        ];
    }
}
