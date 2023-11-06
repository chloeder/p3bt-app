<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>P3BT APP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.css">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/src/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/src/assets/css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('img/logo-p3bt.png') }}" />
    @stack('css')
</head>

<body class="header-fixed">
    <!-- partial:partials/_header.html -->
    <nav class="t-header">
        <div class="t-header-brand-wrapper">
            <a href="{{ route('dashboard') }}">
                <img class="logo" src="{{ asset('img/logo-p3bt.png') }}" style="width: 300px" alt="">
                <img class="logo-mini" src="{{ asset('img/logo-p3bt.png') }}" alt="">
            </a>
        </div>
        <!-- Di atas -->
        <div class="t-header-content-wrapper">
            @include('components.topbar')
        </div>
    </nav>
    <!-- partial -->
    <div class="page-body">
        <!-- partial:partials/_sidebar.html -->
        <!-- sei -->
        <div class="sidebar">
            @include('components.sidebar')
        </div>
        <!-- partial -->
        <div class="page-content-wrapper">
            @yield('content')
        </div>
        <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="{{ asset('admin') }}/src/assets/vendors/js/core.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="{{ asset('admin') }}/src/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('admin') }}/src/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/src/assets/js/charts/chartjs.addon.js"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="{{ asset('admin') }}/src/assets/js/template.js"></script>
    <script src="{{ asset('admin') }}/src/assets/js/dashboard.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('js')
    <!-- endbuild -->
</body>

</html>
