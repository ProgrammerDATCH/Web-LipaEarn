<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed">

<head>
    @include('partials._header')
    @yield('header')
</head>

<body>
    <div class="alert-box-container d-flex justify-content-center position-absolute mt-2" style="width: 100%; z-index: 9999;">
        @yield('messages')
    </div>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('partials._sidebar')
            <div class="layout-page">

                @include('partials._navbar')

                <div class="content-wrapper">
                    {{ $slot }}
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
