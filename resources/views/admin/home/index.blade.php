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
        @include('admin.home.rides-section', [
            'last_rides' => $last_rides,
        ])
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
