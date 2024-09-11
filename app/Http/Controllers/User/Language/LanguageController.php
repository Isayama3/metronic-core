<?php

namespace App\Http\Controllers\User\Language;

use App\Base\Controllers\BaseApiController;
use App\Http\Requests\User\LanguageRequest as FormRequest;
use App\Models\Language as Model;
use App\Http\Resources\LanguageResource as Resource;
use App\Services\LanguageService as Service;

class LanguageController extends BaseApiController
{
    protected $LanguageService;

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
        
        $this->LanguageService = $service;
    }
}
