<?php

namespace App\Services\User;

use App\Base\Services\BaseService;
use App\Enums\UserVerificationStatus;
use App\Models\UserVerification;
use App\Repositories\UserRepository;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserService extends BaseService
{
    protected UserRepository $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        parent::__construct($UserRepository);
        $this->UserRepository = $UserRepository;
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
        if ($user->vehicles->isEmpty())
            throw new HttpResponseException($this->setStatusCode(422)->respondWithError(__("main.vehicle_not_verified")));
    }
}
