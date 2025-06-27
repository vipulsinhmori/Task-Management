<!doctype html>
<html lang="en" class="layout-wide customizer-hide" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>404 - Page Not Found</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('../assets/vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/css/demo.css') }}" />
</head>
<body>
    <div class="full-page-center">
        <div class="error-code">404</div>
        <div class="error-text">Page Not Found️ ⚠️</div>
        <div class="error-description">We couldn't find the page you are looking for.</div>
        <a href="{{ route('/sing') }}" class="btn btn-primary">Back to Home</a>
        <div class="error-image mt-4">
            <img src="../assets/img/illustrations/page-misc-error-light.png" alt="Error Image" width="400" />
        </div>
    </div>
</body>
</html>
