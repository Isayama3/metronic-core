@extends('admin.layouts.partials.crud-components.show-page')
@section('show-page')
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ __('admin.image') }}</h2>
                </div>
            </div>
            <div class="card-body text-center pt-0">
                {{-- {{ \App\Base\Helper\Field::fileWithPreview(name: 'name', label: 'name', required: true, old_image: $record->image_url) }} --}}
            </div>
        </div>
        {{-- <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Status</h2>
                    </div>
                    <div class="card-toolbar">
                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    </div>
                </div>
                <div class="card-body pt-0">
                  
                </div>
            </div> --}}
        {{-- <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Store Template</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                   
                </div>
            </div> --}}
    </div>
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ __('admin.main_data') }}</h2>
                </div>
            </div>
            <div class="card-body pt-0">
                {{ \App\Base\Helper\Field::text(name: 'full_name', label: 'full_name', value: $record->full_name) }}
                {{ \App\Base\Helper\Field::text(name: 'full_name', label: 'full_name', value: $record->full_name) }}
            </div>
        </div>
        {{-- <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Meta Options</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                </div>
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Automation</h2>
                    </div>
                </div>
                <div class="card-body pt-0">

                </div>
            </div> --}}
    </div>
@stop
