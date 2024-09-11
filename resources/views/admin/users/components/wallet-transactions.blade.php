<div class="card card-flush py-4">
    <div class="card-header justify-content-center">
        <div class="card-title">
            <h2>{{ __('admin.transactions') }}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                        <th class="min-w-125px max-w-215px text-center">{{ __('admin.transaction_code') }}</th>
                        <th class="min-w-125px max-w-215px text-center">{{ __('admin.ride') }}</th>
                        <th class="min-w-125px max-w-215px text-center">{{ __('admin.agent') }}</th>
                        <th class="min-w-125px max-w-215px text-center">{{ __('admin.transaction_type') }}</th>
                        <th class="min-w-125px max-w-215px text-center">{{ __('admin.money_amount') }}</th>
                        <th class="min-w-125px max-w-215px text-center">{{ __('admin.transaction_date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions ?? [] as $transaction)
                        <tr class="odd text-center" id="removable{{ $transaction->id }}">
                            <td>
                                <a class="text-gray-800 text-hover-primary fs-5 fw-bold ">
                                    #{{ $transaction->code }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ $transaction->ride_id ? route('admin.rides.show', $transaction->ride_id) : '#' }}"
                                    class="badge badge-light-primary badge-lg fw-bold ">
                                    #{{ $transaction->ride_id ?? __('admin.not_found') }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ $transaction->admin_id ? route('admin.agents.show', $transaction->admin_id) : '#' }}"
                                    class="badge badge-light-primary badge-lg fw-bold ">
                                    #{{ $transaction->agent->full_name ?? __('admin.not_found') }}
                                </a>
                            </td>
                            <td>
                                <div class="badge badge-light-info badge-lg">
                                    {{ __('admin.' . $transaction->status->name) }}
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-light-primary badge-lg">
                                    {{ $transaction->amount }}
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-light-success badge-lg">
                                    {{ $transaction->created_at }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
        {{ $transactions->links('vendor.pagination.custom') }}
    </div>
</div>
