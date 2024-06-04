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
