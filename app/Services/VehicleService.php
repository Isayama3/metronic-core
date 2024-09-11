<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Enums\VehicleVerificationStatus;
use App\Repositories\VehicleRepository;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class VehicleService extends BaseService
{
    protected VehicleRepository $VehicleRepository;
    protected VehicleVerificationService $VehicleVerificationService;

    public function __construct(VehicleRepository $VehicleRepository, VehicleVerificationService $VehicleVerificationService)
    {
        parent::__construct($VehicleRepository);
        $this->VehicleRepository = $VehicleRepository;
        $this->VehicleVerificationService = $VehicleVerificationService;
    }

    public function store($data, $relations = [])
    {
        try {
            DB::beginTransaction();
            $filtered_data = Arr::except($data, ['license_front_image', 'license_back_image']);
            $record = parent::store($filtered_data, $relations);

            $this->VehicleVerificationService->store([
                'vehicle_id' => $record->id,
                'license_status_id' => VehicleVerificationStatus::REVIEWING->value,
                'license_front_image' => $data['license_front_image'],
                'license_back_image' => $data['license_back_image'],
            ]);

            $record->refresh();
            DB::commit();
            return $record;
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->throwHttpExceptionForWebAndApi($e->getMessage(), 422);
        }
    }

    public function setDefaultVehicle($id)
    {
        $vehicles = $this->listUserVehicles();
        foreach ($vehicles as $vehicle) {
            $vehicle->is_default = false;
            $vehicle->save();
        }

        $this->VehicleRepository->update($id, [
            'is_default' => true,
        ]);

        return $this->VehicleRepository->find($id);
    }

    public function listUserVehicles()
    {
        $user = auth('user-api')->user();
        return $this->VehicleRepository->getUserVehicles($user);
    }
}
