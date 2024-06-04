@extends('admin.layouts.partials.crud-components.table', [
    'page_header' => __('admin.rides'),
])

@section('filter')
    @include('admin.admins.filter', [
        'create_route' => $create_route,
    ])
@stop

@section('table_headers')
    <th class="min-w-30 text-center"># </th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.owner') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.vehicle') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.ride_date') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.created_at_&_updated_at') }}</th>
@stop

@section('table_body')
    @foreach ($records as $record)
        <tr class="odd text-center" id="removable{{ $record->id }}">
            <td>{{ $loop->iteration }}</td>
            <td>
                <div class="d-flex align-items-center" style="justify-content: center;">
                    <a href="{{ route('admin.users.show', $record->driver->id) }}" class="symbol symbol-50px">
                        <span class="symbol-label" style="background-image:url({{ $record->driver->image_url }});"></span>
                    </a>
                    <div class="ms-5" style="display: flex;flex-direction: column;">
                        <a href="{{ route('admin.users.show', $record->driver->id) }}"
                            class="text-gray-800 text-hover-primary fs-5 fw-bold"> {{ $record->driver->full_name }}</a>
                        <a href="{{ route('admin.users.show', $record->driver->id) }}"
                            class="text-gray-800 text-hover-primary fs-5 fw-bold"> {{ $record->driver->phone }}</a>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center" style="justify-content: center;">
                    <a href="{{ route('admin.vehicles.show', $record->vehicle->id) }}" class="symbol symbol-50px">
                        <span class="symbol-label" style="background-image:url({{ $record->vehicle->image_url }});"></span>
                    </a>
                    <div class="ms-5" style="display: flex;flex-direction: column;">
                        <a href="{{ route('admin.vehicles.show', $record->vehicle->id) }}"
                            class="text-gray-800 text-hover-primary fs-5 fw-bold"> {{ $record->vehicle->vehicle_name }}</a>
                        <a href="{{ route('admin.vehicles.show', $record->vehicle->id) }}"
                            class="text-gray-800 text-hover-primary fs-5 fw-bold"> {{ $record->vehicle->plate_number }}</a>
                    </div>
                </div>
            </td>
            <td>
                <div class="badge badge-light-success badge-lg">
                    {{ $record->date_schedule }}
                </div>
            </td>
            <td style="display: inline-grid;gap: 5px;">
                <div class="badge badge-light-primary">
                    {{ __('admin.created_at') }}&nbsp;&nbsp;:&nbsp;&nbsp;
                    {{ $record->created_at }}
                </div>
                <div class="badge badge-light-primary">
                    {{ __('admin.updated_at') }}&nbsp;&nbsp;:&nbsp;&nbsp;
                    {{ $record->updated_at }}
                </div>
            </td>
            <td class="text-end">
                @include('admin.layouts.partials.crud-components.actions-buttons', [
                    'hasShow' => $hasShow,
                    'hasEdit' => $hasEdit,
                    'hasDelete' => $hasDelete,
                    'show_route' => $show_route,
                    'edit_route' => $edit_route,
                    'destroy_route' => $destroy_route,
                    'record' => $record,
                ])
            </td>
        </tr>
    @endforeach
@stop
