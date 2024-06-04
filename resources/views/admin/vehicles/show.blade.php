@extends('admin.layouts.partials.crud-components.show-page')
@section('show-page')
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ __('admin.vehicle_image') }}</h2>
                </div>
            </div>
            <div class="card-body text-center pt-0">
                {{ \App\Base\Helper\Field::fileWithPreview(name: 'name', label: 'vehicle_image', required: true, old_image: $record->image_url, disabled: true) }}
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>
                        @if ($record->active)
                            {{ __('admin.active') }}
                        @else
                            {{ __('admin.not_active') }}
                        @endif
                    </h2>
                </div>
                <div class="card-toolbar">
                    @if ($record->active)
                        <div class="rounded-circle bg-danger w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @else
                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ __('admin.main_data') }}</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-md-4">
                        {{ \App\Base\Helper\Field::text(name: 'plate_number', label: 'plate_number', value: $record->plate_number ?? __('admin.undifined'), disabled: true) }}
                    </div>
                    <div class="col-md-4">
                        {{ \App\Base\Helper\Field::text(name: 'color', label: 'color', value: $record->color ?? __('admin.undifined'), disabled: true) }}
                    </div>
                    <div class="col-md-4">
                        {{ \App\Base\Helper\Field::text(name: 'vehicle_type', label: 'vehicle_type', value: $record->type->name ?? __('admin.undifined'), disabled: true) }}
                    </div>
                    <div class="col-md-4">
                        {{ \App\Base\Helper\Field::text(name: 'vehicle_model', label: 'vehicle_model', value: $record->model->name ?? __('admin.undifined'), disabled: true) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ __('admin.verifications') }}</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                @include('admin.vehicles.components.verifications-table', ['record' => $record])
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ __('admin.last_rides') }}</h2>
                </div>
            </div>
            <div class="card-body pt-0">
            
            </div>
        </div>
    @stop
