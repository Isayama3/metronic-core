<?php

namespace App\Http\Controllers\User\TypeAndStatus;

use App\Base\Controllers\BaseApiController;
use App\Base\Resources\SimpleResource;
use App\Http\Requests\User\TypeRequest as FormRequest;
use App\Models\Type as Model;
use App\Http\Resources\TypeResource as Resource;
use App\Services\TypeService as Service;

class TypeController extends BaseApiController
{
    protected $TypeService;

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

        $this->TypeService = $service;
    }

    public function listVehiclesType()
    {
        return $this->respondWithArray(SimpleResource::collection($this->TypeService->listWhereTableName('vehicle_types')));
    }

    public function listSavedPlacesType()
    {
        return $this->respondWithArray(SimpleResource::collection($this->TypeService->listWhereTableName('saved_places')));
    }
}
