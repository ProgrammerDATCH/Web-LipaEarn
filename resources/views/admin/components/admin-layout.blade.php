<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed">

<head>
    @include('partials._header')
    <title>@yield('title', 'Dashboard')</title>
    @yield('header')
</head>
<body>
    <div class="alert-box-container d-flex justify-content-end position-absolute mt-2 px-4" style="width: 100%; z-index: 9999;">
       @yield('alerts')
    </div>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.partials._sidebar')
            <div class="layout-page">

                @include('admin.partials._navbar')

                <div class="content-wrapper">
                    @yield('content')
                </div>


                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
    @include('partials._scripts')
        @yield('scripts')
</body>

</html>
