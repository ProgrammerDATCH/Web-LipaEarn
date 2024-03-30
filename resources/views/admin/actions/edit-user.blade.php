

@section('header')
<title>@yield('title', 'Edit User')</title>
<link rel="stylesheet" href="{{ asset('vendor/css/pages/page-profile.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
@endsection

@extends('admin.components.admin-layout')
@section('content')
    <style>
        .swal2-title {
            font-size: 12px !important;
        }

        .swal2-container {
            width: 270px !important;
        }
    </style>
    @if (session('success'))
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
                title: '{{ session("success") }}',
            })
        </script>
    @endif
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.components.profile-header')
        <div class="card mb-4">
            <h5 class="card-header">Edit Info Of {{ $user->username }}</h5>
            <form class="card-body" id="formAuthentication" action="{{ route('admin.update', ['username' => $user['username']]) }}" method="POST">
                @csrf
                @method('PUT')
                <h6>1. Personal Info</h6>
                <div class="row g-3">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="Username">Username</label>
                        <input type="text" id="Username" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}" name="username">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="Email">Email</label>
                        <input type="text" id="Email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" name="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="number">Phone Number</label>
                        <input type="text" id="number" class="form-control @error('number') is-invalid @enderror" value="{{ $user->number }}" name="number">
                        @error('number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4 mx-n4">
                <h6>2. Account Details</h6>
                <div class="row g-3">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="income">Income</label>
                        <input type="text" id="earnings" class="form-control @error('income') is-invalid @enderror" value="{{ $UserEarning->total_earnings ?? 0 }}" name="earnings">
                        @error('income')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="role">Role</label>
                        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option value="Standard" {{ $user->role === 'Standard' ? 'selected' : '' }}>Standard</option>
                            <option value="Admin"{{ $user->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="lastname">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" id="exampleFormControlSelect2" aria-label="Default select example">
                            <option value="Active" {{ $user->status === 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Pending"{{ $user->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>
            <hr>
            <h5 class="card-header">Change Password</h5>
                <form class="card-body" id="formAuthentication-2" action="{{ route('admin.updatePassword', ['username' => $user['username']]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-12 col-sm-6 form-password-toggle fv-plugins-icon-container">
                            <label class="form-label" for="password">New Password</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="password" id="password" name="password" placeholder="············">
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="mb-3 col-12 col-sm-6 form-password-toggle fv-plugins-icon-container">
                            <label class="form-label" for="password_confirmation">Confirm New Password</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="············">
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-2">Change Password</button>
                        </div>
                    </div>
                </form>

        </div>
    </div>
    @include('partials._auth-scripts')
@endsection
