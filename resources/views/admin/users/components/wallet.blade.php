@push('styles')
    <style>
        @media only screen and (min-width: 1920px) {
            #wallet-button {
                margin-right: 70rem;
                margin-bottom: 10px;
            }
        }
    </style>
@endpush
<div class="card card-flush">
    <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-200px"
        style="background-image:url({{ asset('dashboard/media/svg/shapes/top-green.png') }}); justify-content:center;"
        data-bs-theme="light">
        <div class="align-items-start flex-column" style="display: ruby;">
            <h3 class="card-title text-white pt-10">
                <span class="fw-bold fs-2x mb-3">{{ __('admin.wallet') }}</span>
            </h3>
            @can('admin.users.add.to.wallet')
                @can('admin.users.wallet')
                    <button class="btn btn-primary" id="wallet-button" data-bs-toggle="modal" data-bs-target="#add-to-wallet"> <i
                            class="fa-solid fa-plus">&nbsp;
                            {{ __('admin.add_wallet_balance') }}</i></button>
                    @include('admin.users.components.wallet-modal', ['user' => $user])
                @endcan
            @endcan

        </div>

    </div>
</div>
<div class="card-body" style="margin-top: -10rem !important;">
    <div class="position-relative">
        <div class="row g-3 g-lg-6">
            <div class="col-6">
                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                    <div class="symbol symbol-30px me-5 mb-8">
                        <span class="symbol-label">
                            <i class="ki-duotone ki-wallet fs-1 text-primary">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                    </div>
                    <div class="m-0">
                        <span
                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $user->wallet->wallet_balance ?? 0 }}</span>
                        <span class="text-gray-500 fw-semibold fs-6">{{ __('admin.wallet_balance') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                    <div class="symbol symbol-30px me-5 mb-8">
                        <span class="symbol-label">
                            <i class="ki-duotone ki-two-credit-cart fs-1 text-primary">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                    </div>
                    <div class="m-0">
                        <span
                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $user->wallet->withdraw_money ?? 0 }}</span>
                        <span class="text-gray-500 fw-semibold fs-6">{{ __('admin.withdraw_money') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                    <div class="symbol symbol-30px me-5 mb-8">
                        <span class="symbol-label">
                            <i class="ki-duotone ki-save-deposit fs-1 text-primary">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </div>
                    <div class="m-0">
                        <span
                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $user->wallet->deposited_money ?? 0 }}</span>
                        <span class="text-gray-500 fw-semibold fs-6">{{ __('admin.deposited_money') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                    <div class="symbol symbol-30px me-5 mb-8">
                        <span class="symbol-label">
                            <i class="ki-duotone ki-chart-line-up-2 fs-1 text-primary">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </div>
                    <div class="m-0">
                        <span
                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $user->wallet->trip_used_money ?? 0 }}</span>
                        <span class="text-gray-500 fw-semibold fs-6">{{ __('admin.trip_used_money') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                    <div class="symbol symbol-30px me-5 mb-8">
                        <span class="symbol-label">
                            <i class="ki-duotone ki-two-credit-cart fs-1 text-primary">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                    </div>
                    <div class="m-0">
                        <span
                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $user->wallet->to_be_deposit ?? 0 }}</span>
                        <span
                            class="text-gray-500 fw-semibold fs-6">{{ __('admin.money_that_need_to_be_deposit') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
