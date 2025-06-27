<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('../assets/img/favicon/favicon.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('../assets/vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.css">
    <script src="{{ asset('../assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('../assets/js/config.js') }}"></script>
</head>
<body>
    <div class="container-fluid text-dark p-0">
        @include('moduals_layout.header')        
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('../assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('../assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('../assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('../assets/js/main.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('../assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('../assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('../assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('../assets/js/main.js') }}"></script>
    <script src="{{ asset('../assets/js/dashboards-analytics.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


