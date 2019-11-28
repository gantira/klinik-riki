
<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | {{ config('app.name')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/metisMenu/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/toastr/toastr.min.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('diffdash/assets/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('diffdash/assets/css/demo.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('diffdash/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('diffdash/assets/img/favicon.png') }}">

    @stack('style')
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        @include('layouts.navbar')
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        @include('layouts.sidebar')
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN CONTENT -->
        @yield('content')
        <!-- END MAIN CONTENT -->
        <div class="clearfix"></div>
        <footer>
            <p class="copyright">&copy; 2018 <a href="#" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="{{ asset('diffdash/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('diffdash/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('diffdash/assets/vendor/metisMenu/metisMenu.js') }}"></script>
    <script src="{{ asset('diffdash/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('diffdash/assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('diffdash/assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('diffdash/assets/vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('diffdash/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('diffdash/assets/vendor/chartist-plugin-axistitle/chartist-plugin-axistitle.min.js') }}"></script>
    <script src="{{ asset('diffdash/assets/vendor/chartist-plugin-legend-latest/chartist-plugin-legend.js') }}"></script>
    <script src="{{ asset('diffdash/assets/vendor/toastr/toastr.js') }}"></script>
    <script src="{{ asset('diffdash/assets/scripts/common.js') }}"></script>

    @stack('scripts')
</body>

</html>
