<div class="modal fade" id="add-to-wallet" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">{{ __('admin.add_wallet_balance') }}</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" id="create-form"
                    action="{{ route('admin.users.add.to.wallet', ['id' => $user->id]) }}" enctype="multipart/form-data"
                    data-parsley-validate>
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7">
                        {{ \App\Base\Helper\Field::number(name: 'amount', label: 'money_amount', required: 'true', placeholder: 'money_amount',min:1) }}
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit" id="submitBtn"
                    onclick="disableButton(event)">
                    <span class="indicator-label">{{ __('admin.submit') }}</span>
                </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('admin.close') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
