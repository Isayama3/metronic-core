<?php

namespace App\Http\Controllers\User\ContactUs;

use App\Base\Controllers\BaseApiController;
use App\Http\Requests\User\ContactUsRequest as FormRequest;
use App\Models\Contact as Model;
use App\Http\Resources\ContactUsResource as Resource;
use App\Services\ContactUsService as Service;

class ContactUsController extends BaseApiController
{
    protected $ContactUsService;
    
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
        
        $this->ContactUsService = $service;
        $this->ContactUsService->setIndexRelations([]);
        $this->ContactUsService->setOneItemRelations([]);
        $this->ContactUsService->setCustomWhen($this->customWhen());
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
