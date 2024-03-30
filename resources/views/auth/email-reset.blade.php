<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._header')
   <title> @yield('title', 'Send Password Reset Link')</title>
   <link rel="stylesheet" href="{{ asset('css/page-auth.css') }}">
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset('storage/images/logo_old.svg') }}" class="flex-column ms-4" />
                            </div>
                        </div>
                        @if (session('invalid'))
                            <div class="alert alert-danger message-alert animate__animated animate__headShake text-center">
                                {{ session('invalid') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success message-alert animate__animated animate__headShake text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                        <!-- /Logo -->
                        <h4 class="mb-2">Forgot Password? 🔒</h4>
                        <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
                        <form id="formAuthentication" class="mb-3" action="{{route('EmailVerifyRequest')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
                        </form>
                        <div class="text-center">
                            <a href="{{route('ShowLoginForm')}}" class="d-flex align-items-center justify-content-center">
                                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Back to login
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
    @include('partials._scripts')
    @include('partials._footer')
</body>

</html>
