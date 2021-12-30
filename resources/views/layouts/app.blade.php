<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Edi Hartono">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('ruang-admin/img/logo/logo.png') }}" rel="icon">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('ruang-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('ruang-admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('ruang-admin/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/nprogress.css') }}">
    @stack('styles')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layouts.partials.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.partials.topbar')
                @yield('content')
            </div>
            @include('layouts.partials.footer')
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('ruang-admin/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('ruang-admin/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('ruang-admin/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('ruang-admin/') }}/js/ruang-admin.js"></script>
    <script src="{{ asset('js/nprogress.js') }}"></script>
    @stack('scripts')
</body>

</html>
