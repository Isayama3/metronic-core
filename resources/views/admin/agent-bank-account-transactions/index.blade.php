@extends('admin.layouts.partials.crud-components.table', [
    'page_header' => __('admin.bank_accounts_deposites'),
])

@section('filter')
    @include('admin.bank-accounts.filter', [
        'create_route' => $create_route,
    ])
@stop

@section('table_headers')
    <th class="min-w-30 text-center"># </th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.bank_name') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.account_number') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.account_holder_name') }}</th>
    <th class="min-w-125px max-w-215px text-center">{{ __('admin.active') }}</th>
    {{-- <th class="min-w-125px max-w-215px text-center">{{__('admin.created_at_&_updated_at')}}</th> --}}
@stop

@section('table_body')
    @foreach ($records as $record)
        <tr class="odd text-center" id="removable{{ $record->id }}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $record->bank_name }}</td>
            <td>{{ $record->account_number }}</td>
            <td>{{ $record->account_holder_name }}</td>
            <td> {!! \App\Base\Helper\Field::toggleBooleanView(
                name: 'active',
                label: 'active',
                model: $record,
                url: route('admin.bank-accounts.toggleBoolean.active', ['id' => $record->id, 'action' => 'active']),
            ) !!}
            </td>
            {{-- <td>
                <div class="badge badge-light-primary">
                    {{ __('admin.created_at') }}&nbsp;&nbsp;:&nbsp;&nbsp;
                    {{ $record->created_at }}
                </div>
                <div class="badge badge-light-primary">
                    {{ __('admin.updated_at') }}&nbsp;&nbsp;:&nbsp;&nbsp;
                    {{ $record->updated_at }}
                </div>
            </td> --}}
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
