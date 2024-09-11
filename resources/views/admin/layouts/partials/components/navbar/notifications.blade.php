@php
    $db_notifications = auth('admin')->user()
        ? auth('admin')
            ->user()
            ->notifications()
            ->whereNull('read_at')
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get()
            ->groupBy(function ($notification) {
                if ($notification->notifiable_target_type === 'App\Models\VehicleVerification') {
                    return 'vehicles_verifications';
                } elseif ($notification->notifiable_target_type === 'App\Models\UserVerification') {
                    return 'users_verifications';
                }
            })
        : collect();

    $notifications_collection = [
        'vehicles_verifications' => $db_notifications->get('vehicles_verifications', collect())->all(),
        'users_verifications' => $db_notifications->get('users_verifications', collect())->all(),
    ];

    $total_notifications_count = collect($notifications_collection)->map(fn($array) => count($array))->sum();
@endphp
<div class="app-navbar-item ms-1 ms-md-4">
    <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px"
        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
        data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">
        <i class="ki-duotone ki-notification-status fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
            <span class="path4"></span>
        </i>
    </div>
    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-400px" data-kt-menu="true"
        id="kt_menu_notifications">
        <div class="d-flex flex-column bgi-no-repeat rounded-top"
            style="background-image:url('{{ asset('dashboard/media/misc/menu-header-bg.jpg') }}">
            <h3 class="text-white fw-semibold px-9 mt-10 mb-6">{{ __('admin.notifications') }}
                <span class="fs-8 opacity-75 ps-3">{{ $total_notifications_count }}</span>
            </h3>
            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9">
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab"
                        href="#vehicle-verifications">{{ __('admin.vehicles_verificaiton') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab"
                        href="#user-verifications">{{ __('admin.users_verification') }}</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            @include(
                'admin.layouts.partials.components.navbar.notifications-components.vehicles-verifications-card',
                ['notifications_collection' => $notifications_collection]
            )

            @include(
                'admin.layouts.partials.components.navbar.notifications-components.users-verifications-card',
                ['notifications_collection' => $notifications_collection]
            )

        </div>
    </div>
</div>
