<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <th>{{ __('admin.name') }}</th>
                <th>{{ __('admin.front_image') }}</th>
                <th>{{ __('admin.back_image') }}</th>
                <th>{{ __('admin.verifications') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ __('admin.vehicle_license') }}</td>

                <td>
                    <div class="symbol symbol-200px overflow-hidden me-3">
                        <div class="symbol-label">
                            <a href="{{ $record->verifications->license_front_image_url }}" target="_blank">
                                <img src="{{ $record->verifications->license_front_image_url }}"
                                    alt="{{ $record->full_name }}" class="w-100">
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="symbol symbol-200px overflow-hidden me-3">
                        <div class="symbol-label">
                            <a href="{{ $record->verifications->license_back_image_url }}" target="_blank">
                                <img src="{{ $record->verifications->license_back_image_url }}"
                                    alt="{{ $record->full_name }}" class="w-100">
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    @if ($record->verifications->license_status_id == \App\Enums\VehicleVerificationStatus::VERIFIED->value)
                        <div class="badge badge-light-success">
                            {{ __('admin.verified') }}
                        </div>
                    @elseif ($record->verifications->license_status_id == \App\Enums\VehicleVerificationStatus::REJECTED->value)
                        <div class="badge badge-light-danger">
                            {{ __('admin.rejected') }}
                        </div>
                    @elseif ($record->verifications->license_status_id == \App\Enums\VehicleVerificationStatus::UNVERIFIED->value)
                        <div class="badge badge-light-danger">
                            {{ __('admin.unverified') }}
                        </div>
                    @else
                        <a href="{{ route('admin.vehicles.verify', ['vehicle_id' => $record->id, 'action' => 'license_status_id']) }}"
                            class="btn btn-success">
                            <i class="fas fa-check"></i><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span></i>
                        </a>
                        <a href="{{ route('admin.vehicles.un-verify', ['vehicle_id' => $record->id, 'action' => 'license_status_id']) }}"
                            class="btn btn-danger">
                            <i class="fas fa-times"></i><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span></i>
                        </a>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
