<button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
    </i>{{ __('admin.verifications') }}
</button>

<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">{{ __('admin.verifications') }}</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body">
                @include('admin.vehicles.components.verifications-table', ['record' => $record])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('admin.close') }}</button>
            </div>
        </div>
    </div>
</div>
