@section('header')
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
@endsection
<x-layout :notifications="$notifications" :notificationscounts="$notifications_counts">
    @section('messages')
        @if (session('welcome-msg'))
            <div class="alert alert-success">
                {{ session('welcome-msg') }}
            </div>
        @endif
    @endsection
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="card h-100">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-6">
                            <div class="card-body">
                               <div class=" card-title text-left">
                                    <h5 class="card-title text-primary">Welcome {{ $user->username }} 🎉</h5>
                               </div>
                            </div>
                        </div>
                        <div class="col-sm-6 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('storage/images/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-3 px-3">
                        <div class="btn-social">
                            <a target="_blank" class="btn btn-icon btn-facebook mr-2" href="https://www.facebook.com/sharer/sharer.php?u={{ route('ReferralRequestForm') . '?user=' . auth()->user()->username }}"><i class="tf-icons bx bxl-facebook"></i></a>
                            <a target="_blank" class="btn btn-icon btn-twitter mr-2" href="https://telegram.me/share/url?url={{ route('ReferralRequestForm') . '?user=' . auth()->user()->username }}&text=Message"><i class="tf-icons bx bxl-telegram"></i></a>
                            <a target="_blank" class="btn btn-icon btn-linkedin mr-2" href="https://wa.me/?text={{ route('ReferralRequestForm') . '?user=' . auth()->user()->username }}"><i class="tf-icons bx bxl-whatsapp"></i></a>
                        </div>
                        <x-refermodal :country="$country_data" />
                        <div class="float-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#referAndEarn">Refer Now </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4 col-sm-12">
                <div class="card bg-secondary h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3" style="position: relative;">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2" style="color: white;">Profile Report</h5>
                                    <span class="badge bg-label-warning rounded-pill">Year
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                    </span>
                                </div>
                                <div class="mt-sm-auto">
                                    <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> 2.2%</small>
                                    <h3 class="mb-0" style="color: white;">{{ $UserEarning->total_earnings ?? 0 }} {{$country_data->currency}}</h3>
                                </div>
                            </div>

                        </div>
                        <div id="profileReportChart"></div>
                    </div>

                </div>

            </div>
           
            <div class="col-md-6 mb-4 col-sm-12">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2" style="color: white;">Balance</h5>
                                    <span class="badge bg-label-warning rounded-pill">
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                    </span>
                                </div>

                            </div>
                            <div class="mt-sm-auto">
                                <h1 class="mb-0" style="color: white;">{{ $UserEarning->total_earnings ?? 0 }} {{$country_data->currency}}</h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 col-sm-12">
                <div class="card bg-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2">Withdrawn</h5>
                                    <span class="badge bg-label-warning rounded-pill">
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                    </span>
                                </div>

                            </div>
                            <div class="mt-sm-auto">
                                <h1 class="mb-0">{{ $withdrawal->amount ?? 0 }} {{$country_data->currency}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 col-sm-12">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2" style="color: white;">Exepenses</h5>
                                    <span class="badge bg-label-warning rounded-pill">
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                    </span>
                                </div>

                            </div>
                            <div class="mt-sm-auto">
                                <h1 class="mb-0" style="color: white;">{{$country_data->activation_fees}} {{$country_data->currency}}</h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 col-sm-12">
                <div class="card h-100" style="background-color: var(--bs-indigo);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2" style="color: white;">Profit</h5>
                                    <span class="badge bg-label-warning rounded-pill">
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                    </span>
                                </div>
                            </div>
                            <div class="mt-sm-auto">
                                <h1 class="mb-0" style="color: white;">{{ ($withdrawal->amount ?? 0) + ($UserEarning->total_earnings ?? 0) - $country_data->activation_fees ?? 0 }} {{$country_data->currency}} </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-md-12 col-lg-12 order-2 mb-4 bg-light">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Incomes Statistics</h5>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <i class="menu-icon fa-sharp fas fa-users"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Total Income Earnings</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">{{ $UserEarning->total_earnings ?? 0 }} {{$country_data->currency}}</h6>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <i class="menu-icon fa-sharp fas fa-users"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Referrals Earnings</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">{{ $UserEarning->referral_earnings ?? 0 }} {{$country_data->currency}}</h6>
                            </div>
                        </div>
                    </li>

                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <i class="menu-icon fa-sharp fa-brands fa-youtube"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-3">Video Earnings</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">{{ $UserEarning->video_earnings ?? 0 }} {{$country_data->currency}}</h6>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <i class="menu-icon fa-sharp fa-solid fa-comments-dollar"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Trivia Quiz Earnings</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">{{ $UserEarning->quiz_earnings ?? 0 }} {{$country_data->currency}}</h6>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <i class="menu-icon fa-sharp fa-solid fa-funnel-dollar"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Bonus Earnings</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">{{ $UserEarning->bonus_earnings ?? 0 }} {{$country_data->currency}}</h6>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <i class="menu-icon fa-sharp fa-solid fa-dharmachakra"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Spin Earnings</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">{{ $UserEarning->spin_earnings ?? 0 }} {{$country_data->currency}}</h6>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @section('scripts')
            <script src="{{ asset('vendor/apex-charts/apexcharts.js') }}"></script>
            <script>
                /**
                 * Dashboard Analytics
                 */

                "use strict";

                (function() {
                    let cardColor, headingColor, axisColor, shadeColor, borderColor;

                    cardColor = config.colors.white;
                    headingColor = config.colors.headingColor;
                    axisColor = config.colors.axisColor;
                    borderColor = config.colors.borderColor;

                    // Total Revenue Report Chart - Bar Chart
                    // --------------------------------------------------------------------

                    // Growth Chart - Radial Bar Chart
                    // --------------------------------------------------------------------


                    // Profit Report Line Chart
                    // --------------------------------------------------------------------
                    const profileReportChartEl = document.querySelector("#profileReportChart"),
                        profileReportChartConfig = {
                            chart: {
                                height: 80,
                                // width: 175,
                                type: "line",
                                toolbar: {
                                    show: false,
                                },
                                dropShadow: {
                                    enabled: true,
                                    top: 10,
                                    left: 5,
                                    blur: 3,
                                    color: config.colors.warning,
                                    opacity: 0.15,
                                },
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            grid: {
                                show: false,
                                padding: {
                                    right: 8,
                                },
                            },
                            colors: [config.colors.success],
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                width: 5,
                                curve: "smooth",
                            },
                            series: [{
                                data: [{{ $UserEarning->bonus_earnings ?? 0 }}, {{ $UserEarning->quiz_earnings ?? 0 }}, {{ $UserEarning->video_earnings ?? 0 }}, {{ $UserEarning->referral_earnings ?? 0 }}, {{ $UserEarning->total_earnings ?? 0 }}, {{ $withdrawal->amount ?? 0}}]
                            }, ],
                            xaxis: {
                                show: false,
                                lines: {
                                    show: false,
                                },
                                labels: {
                                    show: false,
                                },
                                axisBorder: {
                                    show: false,
                                },
                            },
                            yaxis: {
                                show: false,
                            },
                        };
                    if (
                        typeof profileReportChartEl !== undefined &&
                        profileReportChartEl !== null
                    ) {
                        const profileReportChart = new ApexCharts(
                            profileReportChartEl,
                            profileReportChartConfig
                        );
                        profileReportChart.render();
                    }

                })();
            </script>
            <script src="{{ asset('js/dashboards-analytics.js') }}"></script>
        @endsection
    </div>
</x-layout>
