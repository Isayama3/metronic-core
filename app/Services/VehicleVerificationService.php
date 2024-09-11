<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Enums\VehicleVerificationStatus;
use App\Repositories\VehicleRepository;
use App\Repositories\VehicleVerificationRepository;

class VehicleVerificationService extends BaseService
{
    protected VehicleVerificationRepository $VehicleVerificationRepository;
    protected VehicleRepository $VehicleRepository;

    public function __construct(VehicleVerificationRepository $VehicleVerificationRepository, VehicleRepository $VehicleRepository)
    {
        parent::__construct($VehicleVerificationRepository);
        $this->VehicleVerificationRepository = $VehicleVerificationRepository;
        $this->VehicleRepository = $VehicleRepository;
    }

    public function verify(int $vehicle_id, string $action)
    {
        $vehicle = $this->VehicleRepository->find($vehicle_id);
        $this->update($vehicle->verifications->id, [
            $action => VehicleVerificationStatus::VERIFIED->value,
        ]);

        $vehicle->refresh();
        return $vehicle;
    }

    public function unVerify(int $vehicle_id, string $action)
    {
        $vehicle = $this->VehicleRepository->find($vehicle_id);
        $this->update($vehicle->verifications->id, [
            $action => VehicleVerificationStatus::REJECTED->value,
        ]);

        $vehicle->refresh();
        return $vehicle;
    }

    public function verifyLicense(array $data, $vehicle_id)
    {
        $vehicle = $this->VehicleRepository->find($vehicle_id);

        $this->checkVerificationStatus($vehicle->verifications->license_status_id);

        $this->update($vehicle->verifications->id, [
            'license_status_id' => VehicleVerificationStatus::REVIEWING->value,
            'license_front_image' => $data['license_front_image'],
            'license_back_image' => $data['license_back_image'],
        ]);

        $vehicle->refresh();
        return $vehicle;
    }

    private function checkVerificationStatus(int $status_id)
    {
        if ($status_id === VehicleVerificationStatus::VERIFIED->value) {
            return $this->throwHttpExceptionForWebAndApi(__('main.already_verified'), 422);
        }

        if ($status_id === VehicleVerificationStatus::REVIEWING->value) {
            return $this->throwHttpExceptionForWebAndApi(__('main.currently_under_review'), 422);
        }
    }

    public function checkVehicleLicenseVerification($vehicle_id)
    {
        $vehicle = $this->VehicleRepository->findOrFail($vehicle_id);
        if ($vehicle->verifications->license_status_id !== VehicleVerificationStatus::VERIFIED->value) {
            return $this->throwHttpExceptionForWebAndApi(__('main.vehicle_license_not_verified'), 422);
        }
    }
}
