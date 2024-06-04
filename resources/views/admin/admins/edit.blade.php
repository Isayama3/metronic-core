@extends('admin.layouts.partials.crud-components.edit-page')
@section('form')
    {{ \App\Base\Helper\Field::text(name: 'full_name', label: 'full_name', required: 'true', placeholder: 'full_name', value: $record->full_name) }}
    {{ \App\Base\Helper\Field::email(name: 'email', label: 'email', required: 'true', placeholder: 'email', value: $record->email) }}
    {{ \App\Base\Helper\Field::number(name: 'phone', label: 'phone', required: 'true', placeholder: 'phone', value: $record->phone) }}
@stop
