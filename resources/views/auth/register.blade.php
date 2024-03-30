<html>

<head>
    @include('partials._header')
    <title>@yield('title', 'Register')</title>
    <link rel="stylesheet" href="{{ asset('css/page-auth.css') }}">
</head>

<body>
    <style>
        #number::-webkit-inner-spin-button {
            display: none;
        }
    </style>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset('storage/images/logo_old.svg') }}" class="flex-column ms-4" />
                            </div>
                        </div>
                        <!-- /Logo -->
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            <?php
                                header('Refresh: 4; url=' . route('ShowLoginForm'));
                                exit();
                            ?>
                        @endif


                        <form id="formAuthentication" class="mb-3" action="{{ route('RegisterRequest') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter your username" autofocus value="{{ old('username') }}" />
                                @error('username')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone Number</label>
                                <input type="number" class="form-control @error('number') is-invalid @enderror" id="number" name="number" placeholder="Enter your number" value="{{ old('number') }}" />
                                @error('number')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password_comfirmation') is-invalid @enderror" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (request('user'))
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="referral">Referral</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="referral" class="form-control @error('referral') is-invalid @enderror" name="referral" value="{{ $user->username }}" />
                                    </div>
                                    @error('referral')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label" for="country">Country</label>
{{--                                <input type="text" id="country" class="form-control @error('country') is-invalid @enderror" name="country" />--}}
                                <select name="country" class="form-select @error('country') is-invalid @enderror">
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Tanzania">Tanzania</option>
                                </select>
                                @error('country')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" id="terms-conditions" name="terms" />
                                    <a href="#">
                                        <label class="form-check-label" for="terms-conditions">
                                            I agree to privacy policy & terms
                                        </label>
                                    </a>
                                    @error('terms')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                @error('terms')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary d-grid w-100">Sign up</button>
                        </form>
                        <p class="text-center">
                            <span>Already have an account?</span>
                            <a href="{{ route('ShowLoginForm') }}">
                                <span>Sign in instead</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
    @include('partials._scripts')
    @include('partials._footer')
    @include('partials._auth-scripts')
    <script src="{{ asset('js/auth-location.js') }}"></script>
</body>

</html>
