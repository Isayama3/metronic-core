@extends('admin.layouts.master', [
    'page_header' => $page_header,
])
@section('content')
    <div class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
        @yield('show-page')
    </div>
@stop
