<?php

namespace App\Http\Controllers\Admin\User;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\UserVerificationRequest as FormRequest;
use App\Models\UserVerification as Model;
use App\Services\UserVerificationService as Service;

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
            view_path: 'admin.user-verifications.',
            hasDelete: false,
            storePermission: 'admin.user-verifications.store',
            showPermission: 'admin.user-verifications.show',
            updatePermission: 'admin.user-verifications.update',
            destroyPermission: 'admin.user-verifications.destroy',
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
        try {
            $this->UserVerificationService->verify($user_id, $action);
            return back()->with('success', __('admin.successfully_verified'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function unVerify($user_id, $action)
    {
        try {
            $this->UserVerificationService->unVerify($user_id, $action);
            return back()->with('success', __('admin.successfully_rejected'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
