<?php

namespace App\Http\Controllers\User\User;

use App\Base\Controllers\BaseApiController;
use App\Http\Requests\User\ChangeLanguageRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\UserRequest as FormRequest;
use App\Models\User as Model;
use App\Http\Resources\UserResource as Resource;
use App\Services\User\UserService as Service;

class UserController extends BaseApiController
{
    protected $UserService;

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
        
        $this->UserService = $service;
    }

    public function customWhen(): array
    {
        return [
            'condition' => false,
            'callback' => function ($q) {
            },
        ];
    }

    public function getAllRelations(): array
    {
        return [];
    }

    public function getOneRelations(): array
    {
        return [];
    }

    public function getProfile()
    {
        $user = $this->UserService->getProfile();
        return $this->respondWithArray($this->resource::make($user));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = $this->UserService->update(auth()->id(), $request->validated());
        return $this->respondWithArray($this->resource::make($user));
    }

    public function changeLanguage(ChangeLanguageRequest $request)
    {
        $user = $this->UserService->update(auth()->id(), $request->validated());
        return $this->respondWithArray($this->resource::make($user));
    }
}
