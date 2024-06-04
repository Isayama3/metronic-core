<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('dashboard/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.png') }}" type="image/x-icon">
    <title>{{ env('APP_NAME', 'production') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/themify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/flag-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('dashboard/assets/css/color-1.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/responsive.css') }}">
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div>
                            {{-- <a class="logo" href="index.html"><img class="img-fluid for-light"
                                    src="{{ asset('dashboard/assets/images/logo/logo.png') }}" alt="looginpage"><img
                                    class="img-fluid for-dark"
                                    src="{{ asset('dashboard/assets/images/logo/logo_dark.png') }}"
                                    alt="looginpage"></a> --}}
                        </div>
                        <div class="login-main">
                            <form class="theme-form" style="text-align: center;" method="POST"
                                action="{{ route('admin.login.post') }}">
                                @csrf
                                <h4>{{ __('admin.sign_in_to_your_account') }}</h4>
                                <p>{{ __('admin.enter_your_email_&_password_to_login') }}</p>
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('admin.email_address') }}</label>
                                    <input class="form-control" type="email" required=""
                                        placeholder="admin@gmail.com" name="login[email]"
                                        {{ $errors->has('login.email') ? 'is-invalid' : '' }}>
                                    <span class="help-block">
                                        <strong id="name_error">{{ $errors->first('login.email') }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('admin.password') }}</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="login[password]"
                                            required="" placeholder="*********"
                                            {{ $errors->has('login.password') ? 'is-invalid' : '' }}>
                                        <span class="help-block">
                                            <strong id="password_error">{{ $errors->first('login.password') }}</strong>
                                        </span>
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox" name="login[remember]">
                                        <label class="text-muted"
                                            for="checkbox1">{{ __('admin.remember_password') }}</label>
                                    </div>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100"
                                            type="submit">{{ __('admin.login') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/script.js') }}"></script>
    </div>
</body>

</html>
