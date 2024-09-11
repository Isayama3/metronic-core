@extends('admin.layouts.master', [
    'page_header' => __('admin.home'),
])
@section('content')
    @can('admin.agents.wallet')
        @if (auth()->user()->isAgent)
            @include('admin.agents.wallet', [
                'record' => $auth_user,
                'transactions' => $transactions,
            ])
        @endif
    @endcan
    <div class="row gy-5 gx-xl-10">
        @include('admin.home.info-cards')
    </div>
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-xl-5">
            <div class="card card-flush h-md-100">
                <div class="card-header pt-7 mb-6">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fs-1hx fw-bold ">{{ __('admin.last_rides') }}</span>
                    </h3>
                </div>
                <div class="card-body py-0 px-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-rounded table-striped  gs-7">
                            <thead>
                                <tr>
                                    <th class="min-w-125px max-w-215px text-center">{{ __('admin.ride_number') }}</th>
                                    <th class="min-w-125px max-w-215px text-center">{{ __('admin.ride_date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($last_rides as $last_ride)
                                    <tr class="odd text-center" id="removable{{ $last_ride->id }}">
                                        <td>
                                            <a href="{{ route('admin.rides.show', $last_ride->id) }}"
                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                {{ $last_ride->id }}#
                                            </a>
                                        </td>
                                        <td>
                                            <div class="badge badge-light-success badge-lg">
                                                {{ $last_ride->date_schedule }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-900">{{ __('admin.rides') }}</span>
                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Users from all channels</span>
                    </h3>
                    <!--end::Title-->

                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav" id="kt_chart_widget_8_tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active"
                                    data-bs-toggle="tab" id="kt_chart_widget_8_day_toggle" href="#kt_chart_widget_8_day_tab"
                                    aria-selected="true" role="tab">{{ __('admin.daily') }}</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1"
                                    data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle"
                                    href="#kt_chart_widget_8_week_tab" aria-selected="true"
                                    role="tab">{{ __('admin.weekly') }}</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1"
                                    data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle"
                                    href="#kt_chart_widget_8_month_tab" aria-selected="false" role="tab"
                                    tabindex="-1">{{ __('admin.monthly') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body pt-6">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="kt_chart_widget_8_day_tab" role="tabpanel"
                            aria-labelledby="kt_chart_widget_8_day_toggle">
                            <div id="chart"></div>
                            <div class="tab-pane fade" id="kt_chart_widget_8_week_tab" role="tabpanel"
                                aria-labelledby="kt_chart_widget_8_week_toggle">
                                <div id="chart"></div>
                            </div>
                            <div class="tab-pane fade" id="kt_chart_widget_8_month_tab" role="tabpanel"
                                aria-labelledby="kt_chart_widget_8_month_toggle">
                                <div id="chart"></div>
                            </div>

                        </div>
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        {{-- <div class="col-xl-8">
            <div class="card card-flush h-md-100">
                <div class="card-header pt-7 mb-6">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fs-1hx fw-bold ">{{ __('admin.rides') }}</span>
                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Updated 37 minutes ago</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.rides.index') }}"
                            class="btn btn-sm btn-success">{{ __('admin.show_all') }}</a>
                    </div>
                </div>
                <div class="card-body pt-6">
                </div>
            </div>
        </div> --}}
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'line'
                },
                series: [{
                    name: 'Sales',
                    data: @json($data['series'])
                }],
                xaxis: {
                    categories: @json($data['categories'])
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'line'
                },
                series: [{
                    name: 'Sales',
                    data: @json($data['series'])
                }],
                xaxis: {
                    categories: @json($data['categories'])
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart1"), options);
            chart.render();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'line'
                },
                series: [{
                    name: 'Sales',
                    data: @json($data['series'])
                }],
                xaxis: {
                    categories: @json($data['categories'])
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart3"), options);
            chart.render();
        });
    </script>
@endpush
