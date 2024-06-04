<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">

<head>
    <base href="../../../" />
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="{{ asset('dashboard/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/fonts/iranyekan/fontface.css') }}">
    <link href="{{ asset('dashboard/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url("{{ asset('dashboard/media/auth/bg4.jpg') }}");
            }

            [data-bs-theme="dark"] body {
                background-image: url("{{ asset('dashboard/media/auth/bg4-dark.jpg') }}");
            }
        </style>
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <div class="d-flex flex-center flex-lg-start flex-column">
                    {{-- <a href="#" class="mb-7">
                        <img alt="Logo" src="{{ asset('dashboard/media/logos/custom-3.svg') }}" />
                    </a> --}}
                </div>
            </div>
            <div
                class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                            data-kt-redirect-url="{{ route('admin.home.index') }}" action="{{ route('admin.login.post') }}">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-dark fw-bolder mb-3">{{ __('admin.login') }}</h1>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="{{ __('admin.email') }}" name="email"
                                    autocomplete="on" class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="{{ __('admin.password') }}" name="password"
                                    autocomplete="on" class="form-control bg-transparent" />
                            </div>
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <span class="indicator-label">{{ __('admin.login') }}</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/js/custom/authentication/sign-in/general.js') }}"></script>
</body>

</html>
