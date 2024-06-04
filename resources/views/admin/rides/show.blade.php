@extends('admin.layouts.partials.crud-components.show-page')
@section('show-page')
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <div class="card card-flush py-4">
            <div class="card-header justify-content-center">
                <div class="card-title ">
                    <h2>{{ __('admin.driver_details') }}</h2>
                </div>
            </div>
            <div class="card-body text-center pt-0">
                <a href="{{ route('admin.users.show', $record->driver->id) }}" class="symbol symbol-100px">
                    {{ \App\Base\Helper\Field::fileWithPreview(name: 'name', label: 'name', required: true, disabled: true, old_image: $record->driver->image_url) }}
                    <div class="badge badge-light-primary badge-lg">
                        {{ $record->driver->full_name }}
                    </div>
                    <div class="badge badge-light-primary badge-lg">
                        {{ $record->driver->phone }}
                    </div>
                </a>
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header justify-content-center">
                <div class="card-title ">
                    <h2>{{ __('admin.vehicle_details') }}</h2>
                </div>
            </div>
            <div class="card-body text-center pt-0">
                <a href="{{ route('admin.vehicles.show', $record->vehicle->id) }}" class="symbol symbol-100px">
                    {{ \App\Base\Helper\Field::fileWithPreview(name: 'name', label: 'name', required: true, disabled: true, old_image: $record->vehicle->image_url) }}
                    <div class="badge badge-light-primary badge-lg">
                        {{ $record->vehicle->type->name }}
                    </div>
                    <div class="badge badge-light-primary badge-lg">
                        {{ $record->vehicle->plate_number }}
                    </div>
                </a>
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ __('admin.instant_booking') }}</h2>
                </div>
                <div class="card-toolbar">
                    @if ($record->instant_booking)
                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @else
                        <div class="rounded-circle bg-danger w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ __('admin.status') }}</h2>
                </div>
                <div class="card-toolbar">
                    @if ($record->status)
                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @else
                        <div class="rounded-circle bg-danger w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ __('admin.is_publish') }}</h2>
                </div>
                <div class="card-toolbar">
                    @if ($record->is_publish)
                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @else
                        <div class="rounded-circle bg-danger w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card card-flush py-4">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ __('admin.middle_seat_empty') }}</h2>
                </div>
                <div class="card-toolbar">
                    @if ($record->middle_seat_empty)
                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    @else
                        <div class="rounded-circle bg-danger w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
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
                        {{ \App\Base\Helper\Field::text(name: 'pickup_address', label: 'pickup_address', value: $record->pickup_address ?? __('admin.undifined'), disabled: true) }}
                    </div>
                    <div class="col-md-4">
                        {{ \App\Base\Helper\Field::text(name: 'dropoff_address', label: 'dropoff_address', value: $record->dropoff_address ?? __('admin.undifined'), disabled: true) }}
                    </div>
                    <div class="col-md-4">
                        {{ \App\Base\Helper\Field::text(name: 'date_schedule', label: 'date_schedule', value: $record->date_schedule ?? __('admin.undifined'), disabled: true) }}
                    </div>
                    <div class="col-md-2">
                        {{ \App\Base\Helper\Field::number(name: 'passengers_limit', label: 'passengers_limit', value: $record->passengers_limit ?? __('admin.undifined'), disabled: true) }}
                    </div>
                    <div class="col-md-2">
                        {{ \App\Base\Helper\Field::number(name: 'price_per_seat', label: 'price_per_seat', value: $record->price_per_seat ?? __('admin.undifined'), disabled: true) }}
                    </div>
                    <div class="col-md-2">
                        {{ \App\Base\Helper\Field::number(name: 'total_price', label: 'total_price', placeholder: 'not_set', value: $record->total_price, disabled: true) }}
                    </div>
                    @if ($record->notes)
                        <div class="col-md-12">
                            {{ \App\Base\Helper\Field::textArea(name: 'notes', label: 'notes', value: $record->notes ?? __('admin.undifined'), disabled: true) }}
                        </div>
                    @endif
                    <div class="col-md-4">
                        <label> {{ __('admin.rating') }}</label>
                        <div class="rating justify-content-start mt-4">
                            @include('admin.layouts.partials.components.custom.rating-component', [
                                'rating' => $record->rating_avg,
                            ])
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ __('admin.ride_requests') }}</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_customers_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-30 text-center"># </th>
                                    <th class="min-w-125px max-w-215px text-center">{{ __('admin.passenger') }}</th>
                                    <th class="min-w-125px max-w-215px text-center">{{ __('admin.price') }}</th>
                                    <th class="min-w-125px max-w-215px text-center">{{ __('admin.payment_method') }}
                                    </th>
                                    <th class="min-w-125px max-w-215px text-center">{{ __('admin.status') }}</th>
                                    <th class="min-w-125px max-w-215px text-center">
                                        {{ __('admin.created_at_&_updated_at') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($record->requests as $request)
                                    <tr class="odd text-center" id="removable{{ $request->user->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center" style="justify-content: center;">
                                                <a href="{{ route('admin.users.show', $request->user->id) }}"
                                                    class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                        style="background-image:url({{ $request->user->image_url }});"></span>
                                                </a>
                                                <div class="ms-5" style="display: flex;flex-direction: column;">
                                                    <a href="{{ route('admin.users.show', $request->user->id) }}"
                                                        class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                        {{ $request->user->full_name }}</a>
                                                    <a href="{{ route('admin.users.show', $request->user->id) }}"
                                                        class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                        {{ $request->user->phone }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $request->price }}</td>
                                        <td>
                                            <div class="badge badge-light-primary badge-lg">
                                                {{ $request->paymentMethod->name }}
                                            </div>
                                        </td>
                                        <td>{{ __('admin.' . $request->status->name) }}</td>


                                        <td style="display: inline-grid;gap: 5px;">
                                            <div class="badge badge-light-primary">
                                                {{ __('admin.created_at') }}&nbsp;&nbsp;:&nbsp;&nbsp;
                                                {{ $request->created_at }}
                                            </div>
                                            <div class="badge badge-light-primary">
                                                {{ __('admin.updated_at') }}&nbsp;&nbsp;:&nbsp;&nbsp;
                                                {{ $request->updated_at }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ __('admin.stopovers') }}</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_customers_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-30 text-center"># </th>
                                    <th class="min-w-125px max-w-215px text-center">{{ __('admin.name') }}</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($record->stopovers as $stopover)
                                    <tr class="odd text-center" id="removable{{ $stopover->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $stopover->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ __('admin.ratings&reviews') }}</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_customers_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-30 text-center"># </th>
                                    <th class="min-w-125px max-w-215px text-center">{{ __('admin.review') }}</th>
                                    <th class="min-w-125px max-w-215px text-center">{{ __('admin.rating') }}</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($record->ratings as $rating)
                                    <tr class="odd text-center" id="removable{{ $rating->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rating->review }}</td>
                                        <td>
                                            <div class="rating justify-content-center">
                                                @include(
                                                    'admin.layouts.partials.components.custom.rating-component',
                                                    [
                                                        'rating' => $rating->rating,
                                                    ]
                                                )
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
    @stop
