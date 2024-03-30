@section('header')
    <title>My Boost Account</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
@endsection
@php
    use Carbon\Carbon;
    $current_time = Carbon::now();
@endphp
<x-layout :notifications="$notifications" :notificationscounts="$notifications_counts">
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
        <div class="card">
            <div class="header d-flex justify-content-between align-items-center  px-2">
                <h5 class="card-header">Clickers</h5>
                <div class="form-group">
                    <form class="input-group">
                        <input type="text" class="form-control" placeholder="Search.." name="search">
                        <button type="submit" class="input-group-text cursor-pointer"><i class="bx bx-search"></i></button>
                    </form>
                </div>
            </div>
            <div>
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <table class="invoice-list-table table border-top">
                            <thead>
                                <tr>
                                    <th>Clicker Name</th>
                                    <th>Screenshot</th>
                                    <th class="cell-fit">Pay</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if ($users && count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-sm me-2"><img src="{{ asset($user->clicker->profile) }}" alt="Avatar" class="rounded-circle"></div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-body text-truncate fw-semibold">{{ $user->clicker->username }}</a>
                                                        <small class="text-truncate text-muted">{{ $user->clicker->email }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="avatar avatar-xs" data-bs-toggle="modal" data-bs-target="#imageModal-{{ $user->id }}">
                                                    <img src="{{ asset($user->screenshot) }}" alt="screenshot" class="rounded-circle">
                                                </div>
                                            </td>
                                            <td class="cell-fit">
                                                <div class="d-flex flex-column">
                                                    @if ($user->paid == 0) <!-- Check if the user has not been paid -->
                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payuser-{{ $user->id }}">Pay User</button>
                                                    @else
                                                        <span class="btn btn-success">Already Paid</span>
                                                    @endif
                                                </div>
                                            </td>

                                        </tr>
                                        <x-pay-user :user="$user" />
                                        <x-image-modal :user="$user" />
                                        @endforeach
                                    <div class="d-flex justify-content-end px-2 py-2">
                                        <div class="mx-2">
                                            <a href="{{ route('ShowCreateBoostingAccountPage') }}" type="button" class="btn btn-primary">Boost Others</a>
                                        </div>
                                        {{ $users->links('components.custom-pagination', ['paginator' => $users]) }}
                                    </div>
                                @else
                                    <div class="d-flex col-12 justify-content-center">
                                        <span class="h6 text-muted text-center">
                                            No Liked your account<br>
                                            <i class="bx bx-chevron-down"></i>
                                        </span>

                                    </div>
                                    <div class="d-flex col-12 justify-content-center py-3 px-3">
                                        <a href="{{ route('ShowCreateBoostingAccountPage') }}" type="button" class="btn btn-primary">Boost Now </a>
                                    </div>

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <x-refermodal :country="$country_data"/>
</x-layout>
