@can('admin.home.index')
    <div class="menu-item">
        <span class="menu-link">
            <span class="menu-icon">
                <i class="fas fa-home fs-2"></i>
            </span>
            <a class="menu-link" href="{{ route('admin.home.index') }}">
                <span class="menu-title">{{ __('admin.home') }}</span>
            </a>
        </span>
    </div>
@endcan

@can('admin.users.index')
    <div class="menu-item">
        <span class="menu-link">
            <span class="menu-icon">
                <i class="fas fa-users fs-2"></i>
            </span>
            <a class="menu-link" href="{{ route('admin.users.index') }}">
                <span class="menu-title">{{ __('admin.users') }}</span>
            </a>
        </span>
    </div>
@endcan

@can('admin.vehicles.index')
    <div class="menu-item">
        <span class="menu-link">
            <span class="menu-icon">
                <i class="fa-solid fa-car fs-2"></i>
            </span>
            <a class="menu-link" href="{{ route('admin.vehicles.index') }}">
                <span class="menu-title">{{ __('admin.vehicles') }}</span>
            </a>
        </span>
    </div>
@endcan

@can('admin.rides.index')
    <div class="menu-item">
        <span class="menu-link">
            <span class="menu-icon">
                <i class="fa-solid fa-taxi fs-2"></i>
            </span>
            <a class="menu-link" href="{{ route('admin.rides.index') }}">
                <span class="menu-title">{{ __('admin.rides') }}</span>
            </a>
        </span>
    </div>
@endcan

@can('admin.reports.index')
    <div class="menu-item">
        <span class="menu-link">
            <span class="menu-icon">
                <i class="fa-solid fa-users-slash"></i>
            </span>
            <a class="menu-link" href="{{ route('admin.reports.index') }}">
                <span class="menu-title">{{ __('admin.reports') }}</span>
            </a>
        </span>
    </div>
@endcan

@can('admin.report-reasons.index')
    <div class="menu-item">
        <span class="menu-link">
            <span class="menu-icon">
                <i class="fa fa-comments" aria-hidden="true"></i>
            </span>
            <a class="menu-link" href="{{ route('admin.report-reasons.index') }}">
                <span class="menu-title">{{ __('admin.report_reasons') }}</span>
            </a>
        </span>
    </div>
@endcan

@can('admin.agents.index')
    <div class="menu-item">
        <span class="menu-link">
            <span class="menu-icon">
                <i class="fas fa-user-tie fs-2"></i>
            </span>
            <a class="menu-link" href="{{ route('admin.agents.index') }}">
                <span class="menu-title">{{ __('admin.agents') }}</span>
            </a>
        </span>
    </div>
@endcan

@can('admin.admins.index')
    <div class="menu-item">
        <span class="menu-link">
            <span class="menu-icon">
                <i class="fas fa-user-tie fs-2"></i>
            </span>
            <a class="menu-link" href="{{ route('admin.admins.index') }}">
                <span class="menu-title">{{ __('admin.admins') }}</span>
            </a>
        </span>
    </div>
@endcan

@can('admin.roles.index')
    <div class="menu-item">
        <span class="menu-link">
            <span class="menu-icon">
                <i class="fas fa-user-tag"></i>
            </span>
            <a class="menu-link" href="{{ route('admin.roles.index') }}">
                <span class="menu-title">{{ __('admin.roles') }}</span>
            </a>
        </span>
    </div>
@endcan

<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-gear">
            </i>
        </span>
        <span class="menu-title">{{ __('admin.settings') }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        @can('admin.settings.main-config.view')
            <div class="menu-item">
                <a class="menu-link" href="{{ route('admin.settings.main-config.view') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ __('admin.main_config') }}</span>
                </a>
            </div>
        @endcan
        @can('admin.settings.about.view')
            <div class="menu-item">
                <a class="menu-link" href="{{ route('admin.settings.about.view') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ __('admin.about') }}</span>
                </a>
            </div>
        @endcan
        @can('admin.settings.terms.view')
            <div class="menu-item">
                <a class="menu-link" href="{{ route('admin.settings.terms.view') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{ __('admin.terms') }}</span>
                </a>
            </div>
        @endcan
    </div>
</div>
