@extends('admin.layouts.partials.crud-components.create-page')
@section('form')
    {{ \App\Base\Helper\Field::text(name: 'full_name', label: 'full_name', required: 'true', placeholder: 'full_name') }}
    {{ \App\Base\Helper\Field::email(name: 'email', label: 'email', required: 'true', placeholder: 'email') }}
    {{ \App\Base\Helper\Field::number(name: 'phone', label: 'phone', required: 'true', placeholder: 'phone') }}
    {{ \App\Base\Helper\Field::password(name: 'password', label: 'password', required: 'true', placeholder: 'password') }}
@stop
