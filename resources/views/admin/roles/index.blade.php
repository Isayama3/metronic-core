@extends('admin.layouts.partials.crud-components.table', [
    'page_header' => __('admin.roles'),
])

@section('filter')
    @include('admin.roles.filter', [
        'create_route' => $create_route,
    ])
@stop

@section('table_headers')
    <th class="min-w-30 text-center"># </th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.name') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.permissions') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.created_at_&_updated_at') }}</th>
@stop

@section('table_body')
    @foreach ($records as $record)
        <tr class="odd text-center" id="removable{{ $record->id }}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $record->name }}</td>
            <td>
                <button type="button" class="btn  btn-sm btn-info" data-bs-toggle="modal"
                    data-bs-target="#permissions_{{ $record->id }}">
                    عرض الصلاحيات
                </button>
                <div class="modal fade" tabindex="-1" id="permissions_{{ $record->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">{{ __('admin.permissions') }}</h3>
                                <div class="btn btn-icon btn-sm btn-active-primary ms-2" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="badges row" style="gap:10px;">
                                    @foreach ($record->permissions->groupBy('group') as $group => $permissions)
                                        <div class="col-12">
                                            <span>{{ $group }}</span>
                                            <br>
                                            @foreach ($permissions as $permission)
                                                <span class="badge badge-light-primary">{{ $permission->name }}</span>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
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
