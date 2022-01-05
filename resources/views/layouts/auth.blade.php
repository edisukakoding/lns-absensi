<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('ruang-admin/img/logo/logo.png') }}" rel="icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('ruang-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

        <link href="{{ asset('ruang-admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('ruang-admin/css/ruang-admin.min.css') }}" rel="stylesheet">
    </head>
    <body class="bg-gradient-login">
        <div class="container-login">
            <div class="row justify-content-center">
              <div class="col-xl-4 col-lg-9 col-md-9">
                <div class="card shadow-sm my-5">
                  <div class="card-body p-0">
                    <div class="row">
                      <div class="col-lg-12">
                        @yield('content')
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <script src="{{ asset('ruang-admin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('ruang-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('ruang-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('ruang-admin/js/ruang-admin.min.js') }}"></script>
    </body>
</html>
