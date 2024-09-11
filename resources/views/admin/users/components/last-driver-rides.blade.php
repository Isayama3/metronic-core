<div class="card card-flush py-4">
    <div class="card-header justify-content-center">
        <div class="card-title">
            <h2>{{ __('admin.last_rides_as_driver') }}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                        <th class="min-w-125px max-w-215px text-center">{{ __('admin.ride') }}</th>
                        <th class="min-w-125px max-w-215px text-center">{{ __('admin.driver') }}</th>
                        <th class="min-w-125px max-w-215px text-center">{{ __('admin.ride_date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($record->rides->take(10) ?? [] as $ride)
                        <tr class="odd text-center" id="removable{{ $ride->id }}">
                            <td>
                                <a href="{{ route('admin.rides.show', $ride->id) }}"
                                    class="text-gray-800 text-hover-primary fs-5 fw-bold ">
                                    #{{ $ride->id }}
                                </a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center" style="justify-content: center;">
                                    <a href="{{ route('admin.users.show', $ride->driver->id) }}"
                                        class="symbol symbol-50px">
                                        <span class="symbol-label"
                                            style="background-image:url({{ $ride->driver->image_url }});"></span>
                                    </a>
                                    <div class="ms-5" style="display: flex;flex-direction: column;">
                                        <a href="{{ route('admin.users.show', $ride->driver->id) }}"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                            {{ $ride->driver->full_name }}</a>
                                        <a href="{{ route('admin.users.show', $ride->driver->id) }}"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                            {{ $ride->driver->phone }}</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-light-success badge-lg">
                                    {{ $ride->date_schedule }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
