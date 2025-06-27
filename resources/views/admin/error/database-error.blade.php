<!doctype html>
<html lang="en" class="layout-wide customizer-hide" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Database Connection Error</title>
    <meta name="description" content="Unable to connect to the database." />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}" />
</head>
<body>
    <div class="full-page-center">
        <div class="error-status">500</div>
        <div class="database-error-text">Database Connection Error ❌</div>
        <div class="databas-error-description">We are currently unable to connect to the database.<br>Please try again later or contact the system administrator.</div>
        <div class="error-image mt-4">
            <img src="{{ asset('assets/img/illustrations/page-misc-error-light.png') }}" alt="Error Image" width="400" />
        </div>
    </div>
</body>
</html>
