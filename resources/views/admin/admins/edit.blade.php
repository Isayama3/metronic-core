@php
    $roles = App\Models\Role::select('id', 'name')->whereNotNull('name')->pluck('name', 'id');
    $user_roles = $record->roles->pluck('id')->toArray();
@endphp

@extends('admin.layouts.partials.crud-components.edit-page')
@section('form')
    {{ \App\Base\Helper\Field::text(name: 'full_name', label: 'full_name', required: 'true', placeholder: 'full_name', value: $record->full_name) }}
    {{ \App\Base\Helper\Field::email(name: 'email', label: 'email', required: 'true', placeholder: 'email', value: $record->email) }}
    {{ \App\Base\Helper\Field::number(name: 'phone', label: 'phone', required: 'true', placeholder: 'phone', value: $record->phone) }}
    <div>
        <label class="form-label mb-1" for="roles">{{ __('admin.roles') }}</label>
        <div class="row">
            @foreach ($roles as $key => $value)
                <div class="col-md-2 mt-5 mx-1">
                    <div class="form-check mb-3">
                        <input type="checkbox" id="{{ $key }}" class="form-check-input {{ $key }}"
                            value="{{ $value }}" name="roles[]" {{ in_array($key, $user_roles) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $key }}">{{ Str::limit($value, 25) }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
