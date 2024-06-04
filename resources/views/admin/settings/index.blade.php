<div class="card card-flush">
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin:::Tabs-->
        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15" role="tablist">
            <!--begin:::Tab item-->
            <li class="nav-item" role="presentation">
                <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab"
                    href="#kt_ecommerce_settings_general" aria-selected="true" role="tab">
                    <i class="ki-duotone ki-home fs-2 me-2"></i>General</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item" role="presentation">
                <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
                    href="#kt_ecommerce_settings_store" aria-selected="false" role="tab" tabindex="-1">
                    <i class="ki-duotone ki-shop fs-2 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>Store</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item" role="presentation">
                <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
                    href="#kt_ecommerce_settings_localization" aria-selected="false" role="tab" tabindex="-1">
                    <i class="ki-duotone ki-compass fs-2 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>Localization</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item" role="presentation">
                <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
                    href="#kt_ecommerce_settings_products" aria-selected="false" role="tab" tabindex="-1">
                    <i class="ki-duotone ki-package fs-2 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>Products</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item" role="presentation">
                <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
                    href="#kt_ecommerce_settings_customers" aria-selected="false" role="tab" tabindex="-1">
                    <i class="ki-duotone ki-people fs-2 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>Customers</a>
            </li>
            <!--end:::Tab item-->
        </ul>
        <!--end:::Tabs-->
        <!--begin:::Tab content-->
        <div class="tab-content" id="myTabContent">
            <!--begin:::Tab pane-->
            <div class="tab-pane fade active show" id="kt_ecommerce_settings_general" role="tabpanel">
                <!--begin::Form-->
                <form id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="#">
                    <!--begin::Heading-->
                    <div class="row mb-7">
                        <div class="col-md-9 offset-md-3">
                            <h2>General Settings</h2>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Meta Title</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Set the title of the store for SEO."
                                    data-bs-original-title="Set the title of the store for SEO."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="meta_title"
                                value="">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Meta Tag Description</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Set the description of the store for SEO."
                                    data-bs-original-title="Set the description of the store for SEO."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid" name="meta_description"></textarea>
                            <!--end::Input-->
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Meta Keywords</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Set keywords for the store separated by a comma."
                                    data-bs-original-title="Set keywords for the store separated by a comma."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <tags class="tagify form-control form-control-solid tagify--noTags tagify--empty"
                                tabindex="-1">
                                <span contenteditable="" tabindex="0" data-placeholder="​" aria-placeholder=""
                                    class="tagify__input" role="textbox" aria-autocomplete="both"
                                    aria-multiline="false"></span>
                                ​
                            </tags><input type="text" class="form-control form-control-solid" name="meta_keywords"
                                value="" data-kt-ecommerce-settings-type="tagify" tabindex="-1">
                            <!--end::Input-->
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Theme</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Set theme style for the store."
                                    data-bs-original-title="Set theme style for the store." data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="w-100">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid select2-hidden-accessible" name="theme"
                                    data-control="select2" data-hide-search="true" data-placeholder="Select a layout"
                                    data-select2-id="select2-data-9-lh61" tabindex="-1" aria-hidden="true"
                                    data-kt-initialized="1">
                                    <option></option>
                                    <option value="Default" selected="selected"
                                        data-select2-id="select2-data-11-mvur">Default</option>
                                    <option value="Minimalist">Minimalist</option>
                                    <option value="Dark">Dark</option>
                                    <option value="High_Contrast">High Contrast</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5"
                                    dir="rtl" data-select2-id="select2-data-10-hu4i" style="width: 100%;"><span
                                        class="selection"><span
                                            class="select2-selection select2-selection--single form-select form-select-solid"
                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                            tabindex="0" aria-disabled="false"
                                            aria-labelledby="select2-theme-zi-container"
                                            aria-controls="select2-theme-zi-container"><span
                                                class="select2-selection__rendered" id="select2-theme-zi-container"
                                                role="textbox" aria-readonly="true"
                                                title="Default">Default</span><span class="select2-selection__arrow"
                                                role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <!--end::Select2-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Default Layout</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Set default layout style for the store."
                                    data-bs-original-title="Set default layout style for the store."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="w-100">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid select2-hidden-accessible" name="layout"
                                    data-control="select2" data-hide-search="true" data-placeholder="Select a layout"
                                    data-select2-id="select2-data-12-39r2" tabindex="-1" aria-hidden="true"
                                    data-kt-initialized="1">
                                    <option></option>
                                    <option value="Default" selected="selected"
                                        data-select2-id="select2-data-14-z8e7">Default</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Home">Home</option>
                                    <option value="Dining">Dining</option>
                                    <option value="Interior">Interior</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5"
                                    dir="rtl" data-select2-id="select2-data-13-sy3n" style="width: 100%;"><span
                                        class="selection"><span
                                            class="select2-selection select2-selection--single form-select form-select-solid"
                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                            tabindex="0" aria-disabled="false"
                                            aria-labelledby="select2-layout-1n-container"
                                            aria-controls="select2-layout-1n-container"><span
                                                class="select2-selection__rendered" id="select2-layout-1n-container"
                                                role="textbox" aria-readonly="true"
                                                title="Default">Default</span><span class="select2-selection__arrow"
                                                role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <!--end::Select2-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Action buttons-->
                    <div class="row py-5">
                        <div class="col-md-9 offset-md-3">
                            <div class="d-flex">
                                <!--begin::Button-->
                                <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                    class="btn btn-light me-3">Cancel</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" data-kt-ecommerce-settings-type="submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">Save</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                    </div>
                    <!--end::Action buttons-->
                </form>
                <!--end::Form-->
            </div>
            <!--end:::Tab pane-->
            <!--begin:::Tab pane-->
            <div class="tab-pane fade" id="kt_ecommerce_settings_store" role="tabpanel">
                <!--begin::Form-->
                <form id="kt_ecommerce_settings_general_store" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="#">
                    <!--begin::Heading-->
                    <div class="row mb-7">
                        <div class="col-md-9 offset-md-3">
                            <h2>Store Settings</h2>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Store Name</span>
                                <span class="ms-1" data-bs-toggle="tooltip" aria-label="Set the name of the store"
                                    data-bs-original-title="Set the name of the store" data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="store_name"
                                value="">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Store Owner</span>
                                <span class="ms-1" data-bs-toggle="tooltip" aria-label="Set the store owner's name"
                                    data-bs-original-title="Set the store owner's name" data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="store_owner"
                                value="">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Address</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Set the store's full address."
                                    data-bs-original-title="Set the store's full address." data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid" name="store_address"></textarea>
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Geocode</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Enter the store geocode manually (optional)"
                                    data-bs-original-title="Enter the store geocode manually (optional)"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="store_geocode"
                                value="">
                            <!--end::Input-->
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Email</span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="email" class="form-control form-control-solid" name="store_email"
                                value="">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Phone</span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="store_phone"
                                value="">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Fax</span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="store_fax"
                                value="">
                            <!--end::Input-->
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Action buttons-->
                    <div class="row py-5">
                        <div class="col-md-9 offset-md-3">
                            <div class="d-flex">
                                <!--begin::Button-->
                                <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                    class="btn btn-light me-3">Cancel</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" data-kt-ecommerce-settings-type="submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">Save</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                    </div>
                    <!--end::Action buttons-->
                </form>
                <!--end::Form-->
            </div>
            <!--end:::Tab pane-->
            <!--begin:::Tab pane-->
            <div class="tab-pane fade" id="kt_ecommerce_settings_localization" role="tabpanel">
                <!--begin::Form-->
                <form id="kt_ecommerce_settings_general_localization"
                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                    <!--begin::Heading-->
                    <div class="row mb-7">
                        <div class="col-md-9 offset-md-3">
                            <h2>Localization Settings</h2>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Country</span>
                            </label>
                            <!--end::Label-->
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Language</span>
                            </label>
                            <!--end::Label-->
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Currency</span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="w-100">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid select2-hidden-accessible"
                                    name="localization_currency" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select a currency" data-select2-id="select2-data-18-a7hb"
                                    tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                    <option data-select2-id="select2-data-20-4kou"></option>
                                    <option value="USD">US Dollar</option>
                                    <option value="Euro">Euro</option>
                                    <option value="Pound">Pound</option>
                                    <option value="AUD">Australian Dollar</option>
                                    <option value="JPY">Japanese Yen</option>
                                    <option value="KRW">Korean Won</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5"
                                    dir="rtl" data-select2-id="select2-data-19-2jae" style="width: 100%;"><span
                                        class="selection"><span
                                            class="select2-selection select2-selection--single form-select form-select-solid"
                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                            tabindex="0" aria-disabled="false"
                                            aria-labelledby="select2-localization_currency-35-container"
                                            aria-controls="select2-localization_currency-35-container"><span
                                                class="select2-selection__rendered"
                                                id="select2-localization_currency-35-container" role="textbox"
                                                aria-readonly="true" title="Select a currency"><span
                                                    class="select2-selection__placeholder">Select a
                                                    currency</span></span><span class="select2-selection__arrow"
                                                role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <!--end::Select2-->
                            </div>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Length Class</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Set the unit measurement for length."
                                    data-bs-original-title="Set the unit measurement for length."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="w-100">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid select2-hidden-accessible"
                                    name="localization_currency" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select a length class" data-select2-id="select2-data-21-m3n8"
                                    tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                    <option></option>
                                    <option value="cm" selected="selected"
                                        data-select2-id="select2-data-23-qvyq">Centimeter</option>
                                    <option value="mm">Milimeter</option>
                                    <option value="in">Inch</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5"
                                    dir="rtl" data-select2-id="select2-data-22-t7qo" style="width: 100%;"><span
                                        class="selection"><span
                                            class="select2-selection select2-selection--single form-select form-select-solid"
                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                            tabindex="0" aria-disabled="false"
                                            aria-labelledby="select2-localization_currency-ed-container"
                                            aria-controls="select2-localization_currency-ed-container"><span
                                                class="select2-selection__rendered"
                                                id="select2-localization_currency-ed-container" role="textbox"
                                                aria-readonly="true" title="Centimeter">Centimeter</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <!--end::Select2-->
                            </div>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Weight Class</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Set the unit measurement for weight."
                                    data-bs-original-title="Set the unit measurement for weight."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="w-100">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid select2-hidden-accessible"
                                    name="localization_currency" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select a weight class" data-select2-id="select2-data-24-auhw"
                                    tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                    <option></option>
                                    <option value="kg" selected="selected"
                                        data-select2-id="select2-data-26-yr5r">Kilogram</option>
                                    <option value="g">Gram</option>
                                    <option value="lb">Pound</option>
                                    <option value="oz">Ounce</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5"
                                    dir="rtl" data-select2-id="select2-data-25-5rc2" style="width: 100%;"><span
                                        class="selection"><span
                                            class="select2-selection select2-selection--single form-select form-select-solid"
                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                            tabindex="0" aria-disabled="false"
                                            aria-labelledby="select2-localization_currency-v5-container"
                                            aria-controls="select2-localization_currency-v5-container"><span
                                                class="select2-selection__rendered"
                                                id="select2-localization_currency-v5-container" role="textbox"
                                                aria-readonly="true" title="Kilogram">Kilogram</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <!--end::Select2-->
                            </div>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Action buttons-->
                    <div class="row py-5">
                        <div class="col-md-9 offset-md-3">
                            <div class="d-flex">
                                <!--begin::Button-->
                                <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                    class="btn btn-light me-3">Cancel</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" data-kt-ecommerce-settings-type="submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">Save</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                    </div>
                    <!--end::Action buttons-->
                </form>
                <!--end::Form-->
            </div>
            <!--end:::Tab pane-->
            <!--begin:::Tab pane-->
            <div class="tab-pane fade" id="kt_ecommerce_settings_products" role="tabpanel">
                <!--begin::Form-->
                <form id="kt_ecommerce_settings_general_products"
                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                    <!--begin::Heading-->
                    <div class="row mb-7">
                        <div class="col-md-9 offset-md-3">
                            <h2>Cateogries Settings</h2>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Category Product Count</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Show the number of products inside the subcategories in the storefront header category menu. Be warned, this will cause an extreme performance hit for stores with a lot of subcategories!"
                                    data-bs-original-title="Show the number of products inside the subcategories in the storefront header category menu. Be warned, this will cause an extreme performance hit for stores with a lot of subcategories!"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex mt-3">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" value=""
                                        name="category_product_count" id="category_product_count_yes"
                                        checked="checked">
                                    <label class="form-check-label" for="category_product_count_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value=""
                                        name="category_product_count" id="category_product_count_no">
                                    <label class="form-check-label" for="category_product_count_no">No</label>
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-16 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Default Items Per Page</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Determines how many items are shown per page."
                                    data-bs-original-title="Determines how many items are shown per page."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid"
                                name="products_items_per_page" value="10">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Heading-->
                    <div class="row mb-7">
                        <div class="col-md-9 offset-md-3">
                            <h2>Reviews Settings</h2>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Allow Reviews</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Enable/disable review entries for registered customers."
                                    data-bs-original-title="Enable/disable review entries for registered customers."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex mt-3">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" value=""
                                        name="allow_reviews" id="allow_reviews_yes" checked="checked">
                                    <label class="form-check-label" for="allow_reviews_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value=""
                                        name="allow_reviews" id="allow_reviews_no">
                                    <label class="form-check-label" for="allow_reviews_no">No</label>
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-16">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Allow Guest Reviews</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Enable/disable review entries for public guest customers"
                                    data-bs-original-title="Enable/disable review entries for public guest customers"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex mt-3">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" value=""
                                        name="allow_guest_reviews" id="allow_guest_reviews_yes">
                                    <label class="form-check-label" for="allow_guest_reviews_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value=""
                                        name="allow_guest_reviews" id="allow_guest_reviews_no" checked="checked">
                                    <label class="form-check-label" for="allow_guest_reviews_no">No</label>
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Heading-->
                    <div class="row mb-7">
                        <div class="col-md-9 offset-md-3">
                            <h2>Vouchers Settings</h2>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Minimum Vouchers</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Minimum number of vouchers customers can attach to an order"
                                    data-bs-original-title="Minimum number of vouchers customers can attach to an order"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="products_min_voucher"
                                value="1">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-16 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Maximum Vouchers</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Maximum number of vouchers customers can attach to an order"
                                    data-bs-original-title="Maximum number of vouchers customers can attach to an order"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="products_max_voucher"
                                value="10">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Heading-->
                    <div class="row mb-7">
                        <div class="col-md-9 offset-md-3">
                            <h2>Tax Settings</h2>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Display Prices with Tax</span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex mt-3">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" value="" name="product_tax"
                                        id="product_tax_yes" checked="checked">
                                    <label class="form-check-label" for="product_tax_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value="" name="product_tax"
                                        id="product_tax_no">
                                    <label class="form-check-label" for="product_tax_no">No</label>
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Default Tax Rate</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Determines the tax percentage (%) applied to orders"
                                    data-bs-original-title="Determines the tax percentage (%) applied to orders"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="products_tax_rate"
                                value="15%">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Action buttons-->
                    <div class="row py-5">
                        <div class="col-md-9 offset-md-3">
                            <div class="d-flex">
                                <!--begin::Button-->
                                <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                    class="btn btn-light me-3">Cancel</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" data-kt-ecommerce-settings-type="submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">Save</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                    </div>
                    <!--end::Action buttons-->
                </form>
                <!--end::Form-->
            </div>
            <!--end:::Tab pane-->
            <!--begin:::Tab pane-->
            <div class="tab-pane fade" id="kt_ecommerce_settings_customers" role="tabpanel">
                <!--begin::Form-->
                <form id="kt_ecommerce_settings_general_customers"
                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                    <!--begin::Heading-->
                    <div class="row mb-7">
                        <div class="col-md-9 offset-md-3">
                            <h2>Customers Settings</h2>
                        </div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Customers Online</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Enable/disable tracking customers online status."
                                    data-bs-original-title="Enable/disable tracking customers online status."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex mt-3">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" value=""
                                        name="customers_online" id="customers_online_yes" checked="checked">
                                    <label class="form-check-label" for="customers_online_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value=""
                                        name="customers_online" id="customers_online_no">
                                    <label class="form-check-label" for="customers_online_no">No</label>
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Customers Activity</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Enable/disable tracking customers activity."
                                    data-bs-original-title="Enable/disable tracking customers activity."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex mt-3">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" value=""
                                        name="customers_activity" id="customers_activity_yes" checked="checked">
                                    <label class="form-check-label" for="customers_activity_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value=""
                                        name="customers_activity" id="customers_activity_no">
                                    <label class="form-check-label" for="customers_activity_no">No</label>
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Customer Searches</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Enable/disable logging customers search keywords."
                                    data-bs-original-title="Enable/disable logging customers search keywords."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex mt-3">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" value=""
                                        name="customers_searches" id="customers_searches_yes" checked="checked">
                                    <label class="form-check-label" for="customers_searches_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value=""
                                        name="customers_searches" id="customers_searches_no">
                                    <label class="form-check-label" for="customers_searches_no">No</label>
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Allow Guest Checkout</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Enable/disable guest customers to checkout."
                                    data-bs-original-title="Enable/disable guest customers to checkout."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex mt-3">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" value=""
                                        name="customers_guest_checkout" id="customers_guest_checkout_yes">
                                    <label class="form-check-label" for="customers_guest_checkout_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value=""
                                        name="customers_guest_checkout" id="customers_guest_checkout_no"
                                        checked="checked">
                                    <label class="form-check-label" for="customers_guest_checkout_no">No</label>
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Login Display Prices</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Only show prices when customers log in."
                                    data-bs-original-title="Only show prices when customers log in."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex mt-3">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="radio" value=""
                                        name="customers_login_prices" id="customers_login_prices_yes">
                                    <label class="form-check-label" for="customers_login_prices_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value=""
                                        name="customers_login_prices" id="customers_login_prices_no"
                                        checked="checked">
                                    <label class="form-check-label" for="customers_login_prices_no">No</label>
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7 fv-plugins-icon-container">
                        <div class="col-md-3 text-md-end">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Max Login Attempts</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Set the max number of login attempts before the customer account is locked for 1 hour."
                                    data-bs-original-title="Set the max number of login attempts before the customer account is locked for 1 hour."
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid"
                                name="customer_login_attempts" value="">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Action buttons-->
                    <div class="row py-5">
                        <div class="col-md-9 offset-md-3">
                            <div class="d-flex">
                                <!--begin::Button-->
                                <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                    class="btn btn-light me-3">Cancel</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" data-kt-ecommerce-settings-type="submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">Save</span>
                                    <span class="indicator-progress">Please wait...
                                        <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                    </div>
                    <!--end::Action buttons-->
                </form>
                <!--end::Form-->
            </div>
            <!--end:::Tab pane-->
        </div>
        <!--end:::Tab content-->
    </div>
    <!--end::Card body-->
</div>
