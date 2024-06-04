@extends('admin.layouts.partials.crud-components.table', [
    'page_header' => __('admin.vehicles'),
])

@section('filter')
    @include('admin.vehicles.filter', [
        'create_route' => $create_route,
    ])
@stop

@section('table_headers')
    <th class="min-w-30 text-center"># </th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.vehicle') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.owner') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.verifications') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.status') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.created_at_&_updated_at') }}</th>
@stop

@section('table_body')
    @foreach ($records as $record)
        <tr class="odd text-center" id="removable{{ $record->id }}">
            <td>{{ $loop->iteration }}</td>
            <td>
                <div class="d-flex align-items-center" style="justify-content: center;">
                    <a href="{{ route($show_route, $record->id) }}" class="symbol symbol-50px">
                        <span class="symbol-label" style="background-image:url({{ $record->image_url }});"></span>
                    </a>
                    <div class="ms-5" style="display: flex;flex-direction: column;">
                        <a href="{{ route($show_route, $record->id) }}"
                            class="text-gray-800 text-hover-primary fs-5 fw-bold"> {{ $record->vehicle_name }}</a>
                        <a href="{{ route($show_route, $record->id) }}"
                            class="text-gray-800 text-hover-primary fs-5 fw-bold"> {{ $record->plate_number }}</a>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center" style="justify-content: center;">
                    <a href="{{ route('admin.users.show', $record->user->id) }}" class="symbol symbol-50px">
                        <span class="symbol-label" style="background-image:url({{ $record->user->image_url }});"></span>
                    </a>
                    <div class="ms-5" style="display: flex;flex-direction: column;">
                        <a href="{{ route('admin.users.show', $record->user->id) }}"
                            class="text-gray-800 text-hover-primary fs-5 fw-bold"> {{ $record->user->full_name }}</a>
                        <a href="{{ route('admin.users.show', $record->user->id) }}"
                            class="text-gray-800 text-hover-primary fs-5 fw-bold"> {{ $record->user->phone }}</a>
                    </div>
                </div>
            </td>
            <td>@include('admin.vehicles.components.verifications')</td>
            <td> {!! \App\Base\Helper\Field::toggleBooleanView(
                name: 'active',
                label: 'active',
                model: $record,
                url: route('admin.vehicles.toggleBoolean.active', ['id' => $record->id, 'action' => 'active']),
            ) !!}
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
