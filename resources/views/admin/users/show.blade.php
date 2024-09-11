@extends('admin.layouts.partials.crud-components.show-page', [
    'page_header' => __('admin.user_details'),
])
@section('show-page')

    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header justify-content-center">
                <div class="card-title">
                    <h2>{{ __('admin.image') }}</h2>
                </div>
            </div>
            <div class="card-body text-center pt-0">
                {{ \App\Base\Helper\Field::fileWithPreview(name: 'name', label: 'name', required: true, old_image: $record->image_url, disabled: true) }}
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>
                        @if ($record->is_smoking)
                            {{ __('admin.is_smoking') }}
                        @else
                            {{ __('admin.is_not_smoking') }}
                        @endif
                    </h2>
                </div>
                <div class="card-toolbar">
                    @if ($record->is_smoking)
                        <div class="rounded-circle bg-danger w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @else
                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>
                        @if ($record->active)
                            {{ __('admin.active') }}
                        @else
                            {{ __('admin.unactive') }}
                        @endif
                    </h2>
                </div>
                <div class="card-toolbar">
                    @if ($record->active)
                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @else
                        <div class="rounded-circle bg-danger w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header justify-content-center">
                <div class="card-title">
                    <h2>{{ __('admin.vehicles') }}</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                        id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-30 text-center"># </th>
                                <th class="min-w-125px max-w-215px text-center">{{ __('admin.vehicle') }}</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($record->vehicles as $vehicle)
                                <tr class="odd text-center" id="removable{{ $vehicle->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center" style="justify-content: center;">
                                            <a href="{{ route('admin.vehicles.show', $vehicle->id) }}"
                                                class="symbol symbol-50px">
                                                <span class="symbol-label"
                                                    style="background-image:url({{ $vehicle->image_url }});"></span>
                                            </a>
                                            <div class="ms-5" style="display: flex;flex-direction: column;">
                                                <a href="{{ route('admin.vehicles.show', $vehicle->id) }}"
                                                    class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                    {{ $vehicle->vehicle_name }}</a>
                                                <a href="{{ route('admin.vehicles.show', $vehicle->id) }}"
                                                    class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                    {{ $vehicle->plate_number }}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-flush py-4">
                            <div class="card-header justify-content-center">
                                <div class="card-title">
                                    <h2>{{ __('admin.main_data') }}</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ \App\Base\Helper\Field::text(name: 'full_name', label: 'full_name', value: $record->full_name ?? __('admin.undifined'), disabled: true) }}
                                    </div>
                                    <div class="col-md-6">
                                        {{ \App\Base\Helper\Field::text(name: 'email', label: 'email', value: $record->email ?? __('admin.undifined'), disabled: true) }}
                                    </div>
                                    <div class="col-md-6">
                                        {{ \App\Base\Helper\Field::text(name: 'phone', label: 'phone', value: $record->phone ?? __('admin.undifined'), disabled: true) }}
                                    </div>
                                    <div class="col-md-6">
                                        {{ \App\Base\Helper\Field::text(name: 'birthday', label: 'birthday', value: $record->birthday ?? __('admin.undifined'), disabled: true) }}
                                    </div>
                                    <div class="col-md-6">
                                        {{ \App\Base\Helper\Field::text(name: 'nationality', label: 'nationality', value: $record->nationality?->name ?? __('admin.undifined'), disabled: true) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card card-flush py-4">
                    <div class="card-header justify-content-center">
                        <div class="card-title">
                            <h2>{{ __('admin.verifications') }}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        @include('admin.users.components.verifications-table', ['record' => $record])
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                @include('admin.users.components.last-user-rides', ['record' => $record])
            </div>
            <div class="col-xl-12">
                @include('admin.users.components.last-driver-rides', ['record' => $record])
            </div>
        </div>
    </div>
@stop
