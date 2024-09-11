<?php

namespace App\Http\Controllers\User\Country;

use App\Base\Controllers\BaseApiController;
use App\Base\Resources\SimpleResource;
use App\Http\Requests\User\CountryRequest as FormRequest;
use App\Models\Country as Model;
use App\Http\Resources\CountryResource as Resource;
use App\Http\Resources\ListPhoneCodeResource;
use App\Services\CountryService as Service;

class CountryController extends BaseApiController
{
    protected $countryService;

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
        $this->countryService = $service;
    }

    public function listPhoneCode()
    {
        return $this->respondWithArray(ListPhoneCodeResource::collection($this->service->getMoreThanOneSelected(['id', 'name', 'phone_code'])));
    }

    public function listName()
    {
        return $this->respondWithArray(SimpleResource::collection($this->service->list('name')));
    }
}
