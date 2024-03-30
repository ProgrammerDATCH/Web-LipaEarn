<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials._header')
    <title>LipaEarn Pay</title>
    <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
</head>

<body>
    <section class="container">
        <div class="py-2 px-2">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center pb-5">
                        <div class="col-md-7 col-xl-7 mb-4 mb-md-0">
                            <div class="py-4">
                                @if (session('message'))
                                    <div class="alert alert-danger">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <h5><span class="far fa-check-square pe-2"></span><b>ELIGIBLE</b> |</h5>
                                    <span class="ps-2">Pay</span>
                            </div>
                            <h4>Activate Your Account and Start Earning Today!</h4>
                            <p>
                                Congratulations on joining our exciting earning website! We are thrilled to welcome you to our community of enthusiastic video watchers, quiz enthusiasts, and referral champions. Your journey towards earning rewards and experiencing the joy of making money online starts right here!
                            </p>
                            <div class="pt-2">
                                <x-paymodal :country="$country_data"/>
                                <div class="row d-flex align-items-stretch">
                                    <div class="col-sm-12 col-lg-6 mb-4">
                                        <div class="card flex-fill h-100">
                                            <div class="card-body text-center">
                                                <i class='mb-3 bx bx-md bx-credit-card'></i>
                                                <h5>Pay With Your Telephone</h5>
                                                <p> Discover the potential income Where You Can Earn Money Without Moving All needed is your phone or laptop.</p>
                                                <button type="button" class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#addNewAddress" id="paymodalbtn"> Pay Now </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6 mb-4">
                                        <div class="card flex-fill h-100">
                                            <div class="card-body text-center">
                                                <i class="mb-3 bx bx-md bx-gift"></i>
                                                <h5>Refer &amp; Earn</h5>
                                                <p>Use Refer &amp; Earn modal to encourage your exiting customers refer their friends &amp; colleague.</p>
                                                <button type="button" class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#referAndEarn">Refer Now </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body d-flex justify-content-end align-items-center text-muted h5 gap-2">
                            Already Paid <a href="{{ route('ShowDashboard') }}" class="btn btn-primary btn-lg">Go To Dashboard</a>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center align-middle justify-content-end py-1 px-1">
                            @csrf
                            @method('POST')
                            <button class="btn btn-outline-danger" href="{{ route('logout') }}" type="submit"><i class="bx bx-log-out-circle me-1"></i>Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-refermodal :country="$country_data" />
    @include('partials._scripts')
</body>

</html>
