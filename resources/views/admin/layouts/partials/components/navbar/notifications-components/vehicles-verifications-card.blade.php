<div class="tab-pane fade show active" id="vehicle-verifications" role="tabpanel">
    <div class="scroll-y mh-325px my-5 px-8">
        @if (count($notifications_collection['vehicles_verifications']) > 0)
            @foreach ($notifications_collection['vehicles_verifications'] as $notification)
                <div class="d-flex flex-stack py-4">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-35px me-4">
                            <span class="symbol-label bg-light-primary">
                                <img src="{{ $notification->icon_path_url }}" width="35">
                            </span>
                        </div>
                        <div class="mb-0 me-2">
                            <a href="{{ route('admin.vehicles.show', ['vehicle' => $notification->notifiable_target_id]) }}"
                                class="fs-6 text-gray-800 text-hover-primary fw-bold">{{ $notification->title }}</a>
                            <div class="text-gray-400 fs-7">{{ $notification->body }}</div>
                        </div>
                    </div>
                    <span
                        class="badge badge-light fs-8">{{ $notification->created_at?->diffForHumans() }}</span>
                </div>
            @endforeach
        @else
            <div class="d-flex flex-stack py-4" style="justify-content: center;">
                <h4 class="text-danger">{{ __('admin.no_notifications') }}</h4>
            </div>
        @endif
    </div>
</div>