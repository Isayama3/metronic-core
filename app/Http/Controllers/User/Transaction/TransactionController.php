<?php

namespace App\Http\Controllers\User;

use App\Base\Controllers\BaseApiController;
use App\Http\Requests\User\TransactionRequest as FormRequest;
use App\Models\Transaction as Model;
use App\Http\Resources\TransactionResource as Resource;
use App\Services\TransactionService as Service;

class TransactionController extends BaseApiController
{
    protected $TransactionService;
    
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
        
        $this->TransactionService = $service;
        $this->TransactionService->setIndexRelations([]);
        $this->TransactionService->setOneItemRelations([]);
        $this->TransactionService->setCustomWhen($this->customWhen());
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
