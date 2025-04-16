<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('PLN', 'PLN') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('build/assets/images/logos/logo-pln.png') }}" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('build/assets/css/styles.min.css') }}" />
</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('layouts.sidebaradmin')
        <!-- Sidebar End -->

        <!-- Main Wrapper -->
        <div class="body-wrapper">
            <!-- Header Start -->
            @include('layouts.headeradmin')
            <!-- Header End -->

            <!-- Main Content -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('build/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('build/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('build/assets/js/dashboard.js') }}"></script>
</body>

</html>
