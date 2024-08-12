<div style="display:flex; gap:5px; justify-content:center;">
    @if ($hasShow)
        @can($showPermission)
            <a href="{{ route($show_route, $record->id) }}">
                <button class="btn btn-icon btn-warning btn-sm"><i class="fas fa-eye fs-4"></i></button>
            </a>
        @endcan
    @endif
    @if ($hasEdit)
        @can($updatePermission)
            <a href="{{ route($edit_route, $record->id) }}">
                <button class="btn btn-icon btn-success btn-sm"><i class="bi bi-pencil-square fs-4"></i></button>
            </a>
        @endcan
    @endif
    @if ($hasDelete)
        @can($destroyPermission)
            <button id="{{ $record->id }}" data-token="{{ csrf_token() }}"
                data-route="{{ route($destroy_route, $record->id) }}" type="button"
                class="btn btn-icon btn-danger destroy btn-sm">
                <i class="bi bi-trash-fill fs-4"></i>
            </button>
        @endcan
    @endif
    @if (!$hasEdit && !$hasDelete && !$hasShow)
        <div class="badge badge-light-danger">
            {{ __('admin.no_actions') }}
        </div>
    @endif
</div>
