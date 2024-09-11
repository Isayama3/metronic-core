@extends('admin.layouts.partials.crud-components.show-page', [
    'page_header' => __(''),
])
@section('show-page')
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-12 mt-5">
                        @include('admin.users.components.wallet', ['user' => $record])
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-12 mt-5">
                        @include('admin.users.components.wallet-transactions', [
                            'transactions' => $transactions,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
