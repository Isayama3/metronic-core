@extends('admin.layouts.partials.crud-components.table', [
    'page_header' => __('admin.users'),
])

@section('filter')
    @include('admin.users.filter', [
        'create_route' => $create_route,
    ])
@stop

@section('table_headers')
    <th class="min-w-30 text-center"># </th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.user') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.email') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.verifications') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.status') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.wallet') }}</th>
@stop

@section('table_body')
    @foreach ($records as $record)
        <tr class="odd text-center" id="removable{{ $record->id }}">
            <td>{{ $loop->iteration }}</td>
            <td>
                <div class="d-flex align-items-center" style="justify-content: center;">
                    <a href="{{ route('admin.users.show', $record->id) }}" class="symbol symbol-50px">
                        <span class="symbol-label" style="background-image:url({{ $record->image_url }});"></span>
                    </a>
                    <div class="ms-5" style="display: flex;flex-direction: column;">
                        <a href="{{ route('admin.users.show', $record->id) }}"
                            class="text-gray-800 text-hover-primary fs-5 fw-bold"> {{ $record->full_name }}</a>
                        <a href="{{ route('admin.users.show', $record->id) }}"
                            class="text-gray-800 text-hover-primary fs-5 fw-bold"> {{ $record->phone }}</a>
                    </div>
                </div>
            </td>
            <td>{{ $record->email ?? __('admin.undifined') }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                    data-bs-target="#verificationsModal-{{ $record->id }}">
                    </i>{{ __('admin.verifications') }}
                </button>
                @include('admin.users.components.verifications', ['id' => $record->id])
            </td>
            <td> {!! \App\Base\Helper\Field::toggleBooleanView(
                name: 'active',
                label: 'active',
                model: $record,
                url: route('admin.users.toggleBoolean.active', ['id' => $record->id, 'action' => 'active']),
            ) !!}
            </td>
            <td style="gap: 5px;">
                {{-- @can($showPermission) --}}
                <a href="{{ route('admin.users.wallet', $record->id) }}">
                    <button class="btn btn-icon btn-primary btn-sm"><i class="fa-solid fa-wallet"></i></button>
                </a>
                {{-- @endcan --}}
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
