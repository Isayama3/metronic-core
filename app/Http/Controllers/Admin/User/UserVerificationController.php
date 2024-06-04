<?php

namespace App\Http\Controllers\Admin\User;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\UserVerificationRequest as FormRequest;
use App\Models\UserVerification as Model;
use App\Services\Admin\UserVerificationService as Service;

class UserVerificationController extends BaseWebController
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
            $service,
            hasDelete: false,
            view_path: 'admin.user-verifications.'
        );

        $this->UserVerificationService = $service;
        $this->UserVerificationService->setIndexRelations([]);
        $this->UserVerificationService->setOneItemRelations([]);
        $this->UserVerificationService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => false,
            'callback' => function ($q) {
            },
        ];
    }

    public function verify($user_id, $action)
    {
        $this->UserVerificationService->verify($user_id, $action);
        return redirect()->route('admin.users.index')->with('success', __('admin.successfully_verified'));
    }

    public function unVerify($user_id, $action)
    {
        $this->UserVerificationService->unVerify($user_id, $action);
        return redirect()->route('admin.users.index')->with('success', __('admin.successfully_rejected'));
    }
}
