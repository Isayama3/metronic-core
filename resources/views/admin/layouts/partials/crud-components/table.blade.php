@extends('admin.layouts.master', [
    'page_header' => $page_header,
])
@section('content')

            <div class="card">
                @yield('filter')
                <div class="card-body pt-0">
                    <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                id="kt_customers_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        {{-- <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label=""
                                                style="width: 29.8906px;">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                        data-kt-check-target="#kt_customers_table .form-check-input" value="1">
                                                </div>
                                            </th> --}}
                                        @yield('table_headers')

                                        <th class="min-w-125px max-w-210px text-center">{{ __('admin.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @yield('table_body')
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <form class="form" data-parsley-validate>
                                <div
                                    class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                    <div class="dataTables_length" id="kt_customers_table_length">
                                        <label><select name="per_page" aria-controls="kt_customers_table"
                                                class="form-select form-select-sm form-select-solid" onchange='submit()'>
                                                <option disabled selected>{{ __('admin.results_per_page') }}</option>
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select></label>
                                    </div>
                                </div>
                            </form>
                            <div
                                class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                {{ $records->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
