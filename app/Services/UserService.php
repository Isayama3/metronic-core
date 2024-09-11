<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\UserRepository;

class UserService extends BaseService
{
    protected UserRepository $UserRepository;
    protected UserVerificationService $UserVerificationService;

    public function __construct(UserRepository $UserRepository, UserVerificationService $UserVerificationService)
    {
        parent::__construct($UserRepository);
        $this->UserRepository = $UserRepository;
        $this->UserVerificationService = $UserVerificationService;
    }

    public function getUserByPhoneOrEmail($phone = null, $email = null)
    {
        return $this->UserRepository->getUserByPhoneOrEmail($phone, $email);
    }

    public function getProfile()
    {
        return $this->UserRepository->getProfile();
    }

    public function checkUserHaveVehicles()
    {
        $user = $this->UserRepository->getProfile();
        if ($user->vehicles->isEmpty()) {
            return $this->throwHttpExceptionForWebAndApi(__('main.vehicle_not_verified'), 422);
        }
    }
}
