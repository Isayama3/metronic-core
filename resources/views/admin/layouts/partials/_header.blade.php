<head>
    <base href="" />
    <title>{{ isset($page_header) ? $page_header : Config('APP_NAME') }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('dashboard/media/logos/favicon.ico') }}" />
    @if (\Illuminate\Support\Facades\App::getLocale() == 'ar')
        <link href="{{ asset('dashboard/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('dashboard/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <style>
        .form-control:disabled {
            color: whitesmoke !important;
        }
    </style>
    @stack('styles')

</head>
