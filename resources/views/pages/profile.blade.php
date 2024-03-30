@section('header')
    <title>Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
    <style>
        .swal2-title {
            font-size: 12px !important;
        }

        .swal2-container {
            width: 270px !important;
        }
    </style>
@endsection

<x-layout :notifications="$notifications" :notificationscounts="$notifications_counts">
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (session('message'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: '{{ session("message") }}',
                })
            </script>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li>

                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <div class="card-body">
                        <form id="formAuthentication" method="POST" action="{{ route('UpdateProfile', ['id' => Auth()->user()->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset(Auth()->user()->profile) }}" alt="user-avatar" class="img-fluid rounded" height="100" width="100" id="uploadedAvatar" />
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" name="profile_picture" />
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>

                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control" type="text" id="username" name="username" value="{{ Auth()->user()->username }}" autofocus />
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ Auth()->user()->email }}" placeholder="john.doe@example.com" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="number">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">RW (+250)</span>
                                            <input type="text" id="number" name="number" class="form-control @error('number') is-invalid @enderror" value="{{ Auth()->user()->number }}" />
                                        </div>
                                        @error('number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control user-select-none @error('country') is-invalid @enderror" id="country" name="country" placeholder="country" value="{{ Auth()->user()->country }}" />
                                        @error('country')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2 mt-2 cancel-btn">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary me-2 mt-2 cancel-btn">Cancel</button>
                                </div>
                                <style>
                                    @media (max-width: 500px) {
                                        .cancel-btn {
                                            width: 100%;
                                        }
                                    }
                                </style>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card mb-4">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                        <form id="formAuthentication-2" method="POST" action="{{ route('UpdatePassword', ['id' => Auth()->user()->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-12 col-sm-6 form-password-toggle fv-plugins-icon-container">
                                    <label class="form-label" for="password">New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="············">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12 col-sm-6 form-password-toggle fv-plugins-icon-container">
                                    <label class="form-label" for="password_confirmation">Confirm New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation" placeholder="············">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary me-2">Change Password</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                {{-- <x-deactivate /> --}}
                {{-- <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                        <form id="formAccountDeactivation" onsubmit="return false">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="accountActivation" />
                                <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                            </div>
                            <button type="submit" class="btn btn-danger" onclick="show_alert()">Deactivate Account</button>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @section('scripts')
        @include('partials._auth-scripts')
        <script src="{{ asset('js/app-user-view.js') }}"></script>
        <script src="{{ asset('js/app-user-view-security.js') }}"></script>
        <script src="{{ asset('js/pages-account-settings-account.js') }}"></script>
    @endsection
</x-layout>
