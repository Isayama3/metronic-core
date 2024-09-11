<?php

namespace App\Http\Controllers\User\User;

use App\Base\Controllers\BaseApiController;
use App\Http\Requests\User\UserVerificationRequest as FormRequest;
use App\Http\Requests\User\VerifyDrivingLicenseRequest as UserVerifyDrivingLicenseRequest;
use App\Http\Requests\User\VerifyNationalIDRequest as UserVerifyNationalIDRequest;
use App\Http\Resources\UserResource;
use App\Models\UserVerification as Model;
use App\Http\Resources\UserVerificationResource as Resource;
use App\Services\UserVerificationService as Service;

class UserVerificationController extends BaseApiController
{
    protected $UserVerificationService;

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

        $this->UserVerificationService = $service;
    }

    public function customWhen(): array
    {
        return [
            'condition' => false,
            'callback' => function ($q) {
            },
        ];
    }

    public function verifyNationalID(UserVerifyNationalIDRequest $request)
    {
        $user = $this->UserVerificationService->verifyNationalID($request->validated());
        return $this->respondWithSuccess(__('main.reviewing'), ['user' => UserResource::make($user)]);
    }

    public function verifyDrivingLicense(UserVerifyDrivingLicenseRequest $request)
    {
        $user = $this->UserVerificationService->verifyDrivingLicense($request->validated());
        return $this->respondWithSuccess(__('main.reviewing'), ['user' => UserResource::make($user)]);
    }
}
