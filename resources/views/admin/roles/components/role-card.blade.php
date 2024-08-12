<div class="col-md-4">
    <div class="card card-flush h-md-100">
        <div class="card-header">
            <div class="card-title">
                <h2>{{ $role->name }}</h2>
            </div>
        </div>
        <div class="card-body pt-1">
            <div class="fw-bold text-gray-600 mb-5">{{ __('admin.total_users_with_this_role') }}:
                {{ $role->users->count() }}
            </div>
            <div class="d-flex flex-column text-gray-600">
                @foreach ($role->permissions->slice(0, 15) as $permission)
                    <div class="d-flex align-items-center py-2"><span
                            class="bullet bg-primary me-3"></span>{{ $permission->display_name }}</div>
                @endforeach
                @if ($role->permissions->count() > 15)
                    <div class="d-flex align-items-center py-2"><span
                            class="bullet bg-primary me-3"></span><em>{{ __('admin.more') }} ....</em></div>
                @endif
            </div>
        </div>
        <div class="card-footer flex-wrap pt-0">
            <a href="#" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
            <button type="button" class="btn btn-light btn-active-light-primary my-1" data-bs-toggle="modal"
                data-bs-target="#kt_modal_update_role">Edit Role</button>
        </div>
    </div>
</div>
