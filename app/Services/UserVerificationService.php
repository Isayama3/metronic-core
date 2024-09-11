<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Enums\UserVerificationStatus;
use App\Repositories\UserRepository;
use App\Repositories\UserVerificationRepository;

class UserVerificationService extends BaseService
{
    protected UserVerificationRepository $UserVerificationRepository;
    protected UserRepository $UserRepository;

    public function __construct(UserVerificationRepository $UserVerificationRepository, UserRepository $UserRepository)
    {
        parent::__construct($UserVerificationRepository);
        $this->UserVerificationRepository = $UserVerificationRepository;
        $this->UserRepository = $UserRepository;
    }

    public function verify($user_id, $action)
    {
        $user = $this->UserRepository->find($user_id);
        $this->update($user->verifications->id, [
            $action => UserVerificationStatus::VERIFIED->value,
        ]);

        $user->refresh();
        return $user;
    }

    public function unVerify($user_id, $action)
    {
        $user = $this->UserRepository->find($user_id);
        $this->update($user->verifications->id, [
            $action => UserVerificationStatus::REJECTED->value,
        ]);

        $user->refresh();
        return $user;
    }

    public function verifyNationalID(array $data)
    {
        $user = auth('user-api')->user()->load(['verifications']);

        $this->checkVerificationStatus($user->verifications->national_id_card_status_id);

        $this->update($user->verifications->id, [
            'national_id_card_status_id' => UserVerificationStatus::REVIEWING->value,
            'national_id_card_front_image' => $data['national_id_card_front_image'],
            'national_id_card_back_image' => $data['national_id_card_back_image'],
        ]);

        $user->refresh();
        return $user;
    }

    public function verifyDrivingLicense(array $data)
    {
        $user = auth('user-api')->user()->load(['verifications']);

        $this->checkVerificationStatus($user->verifications->driving_license_status_id);

        $this->update($user->verifications->id, [
            'driving_license_status_id' => UserVerificationStatus::REVIEWING->value,
            'driving_license_front_image' => $data['driving_license_front_image'],
            'driving_license_back_image' => $data['driving_license_back_image'],
        ]);

        $user->refresh();
        return $user;
    }

    private function checkVerificationStatus(int $status_id)
    {
        if ($status_id === UserVerificationStatus::VERIFIED->value) {
            return $this->throwHttpExceptionForWebAndApi(__('main.already_verified'), 422);
        }

        if ($status_id === UserVerificationStatus::REVIEWING->value) {
            return $this->throwHttpExceptionForWebAndApi(__('main.currently_under_review'), 422);
        }
    }

    public function checkUserNationalIDVerification()
    {
        $user = $this->UserRepository->getProfile();
        if ($user->verifications->national_id_card_status_id !== UserVerificationStatus::VERIFIED->value) {
            return $this->throwHttpExceptionForWebAndApi(__('main.national_id_card_not_verified'), 422);
        }

    }

    public function checkUserDrivingLicenseVerification()
    {
        $user = $this->UserRepository->getProfile();

        if ($user->verifications->driving_license_status_id !== UserVerificationStatus::VERIFIED->value) {
            return $this->throwHttpExceptionForWebAndApi(__('main.driving_license_not_verified'), 422);
        }

    }
}
