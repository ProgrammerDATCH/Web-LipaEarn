<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('storage/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/boxicons.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/Font_Awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/Material_Design/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/apex-charts/apex-charts.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <script src="{{ asset('js/helpers.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <style>
      body{
        background-position: center;
        object-fit: cover;
        background-image: url({{ asset('storage/images/illustrations/403.png')}});
        
      }
    </style>

    <title>403</title>
</head>
<body>
    <div class="container-xxl container-p-y col-12 d-flex justify-content-center">
        <div class="misc-wrapper" style="z-index: 9999">
         <div class=" text-center">
          <h2 class="mb-2 mx-2">You are not authorized!</h2>
          <p class="mb-4 mx-2">You do not have permission to view <br> this page using the credentials that you have provided while login. <br> Please contact your site administrator.</p>
          <a href="{{route('ShowDashboard')}}" class="btn btn-primary">Back to home</a>
         </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('js/ui-popover.js') }}"></script>
    <script src="{{ asset('js/ui-toasts.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
