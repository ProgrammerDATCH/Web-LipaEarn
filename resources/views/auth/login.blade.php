<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._header')
    <title>@yield('title', 'Login')</title>
    <link rel="stylesheet" href="{{ asset('css/page-auth.css') }}">

</head>
<style>
    .btn-social {
        background: #fff;
        color: #5d6778;
        border: 1px solid #e7e9ed
    }

    .btn-social:hover,
    .btn-social:active,
    .btn-social:focus {
        background: #fff;
        outline: none;
        color: #252930;
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);
        border: 1px solid #e7e9ed
    }

    .btn-social .icon-holder {
        display: inline-block;
        text-align: left
    }

    .btn-social .icon-holder img {
        position: relative;
        top: -1px
    }

    .btn-social {
        padding-left:.5rem;display:inline-block
    }
</style>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <img src="{{ asset('storage/images/logo.png') }}" class="flex-column w-50" />
                            </div>
                        </div>
                        @if (session('invalid'))
                            <div class="alert alert-danger message-alert text-center">
                                {{ session('invalid') }}
                            </div>
                        @endif
                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome to LipaEarn! 👋</h4>
                        <form id="formAuthentication" class="mb-3" action="{{ route('LoginRequest') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" autofocus value="{{ old('username') }}" />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    @if (Route::has('EmailVerifyForm'))
                                        <a href="{{ route('EmailVerifyForm') }}">
                                            <small>{{ __('Forgot Your Password?') }}</small>
                                        </a>
                                    @endif
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                                    <label class="form-check-label" for="remember-me"> {{ __('Remember Me') }}</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100">Sign in</button>
                            </div>
                        </form>


                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="{{ route('ShowRegisterForm') }}">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials._scripts')
    @include('partials._footer')
    @include('partials._auth-scripts')
</body>

</html>
