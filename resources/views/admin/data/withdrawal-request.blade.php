@php
    use Carbon\Carbon;
    
    $current_time = Carbon::now();
@endphp


@section('header')
@section('title', 'Withdraw Request')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
@endsection

@extends('admin.components.admin-layout')
@section('content')
@if (session('success'))
    <style>
        .swal2-title {
            font-size: 12px !important;
        }

        .swal2-container {
            width: 270px !important;
        }
    </style>
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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users /</span>Table</h4>
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Withdraw Request
                <span class="badge bg-label-danger me-1">{{$users->count()}} Users</span>
                </h5>
                

           
            <div class="card-datatable text-nowrap">
                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">

                        </div>
                        <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end mb-2">
                            <div id="DataTables_Table_1_filter" class="dataTables_filter">
                                <form action="">
                                    @csrf
                                    <input type="search" class="form-control" placeholder="Search" name="search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="dt-column-search table table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="1" class="text-nowrap">Profile</th>
                                    <th rowspan="1" colspan="1" class="text-nowrap">Username</th>
                                    <th rowspan="1" colspan="1" class="text-nowrap">Email</th>
                                    <th rowspan="1" colspan="1" class="text-nowrap">Request Number</th>
                                    <th rowspan="1" colspan="1" class="text-nowrap">Amount</th>
                                    <th rowspan="1" colspan="1" class="text-nowrap">Country</th>
                                    <th rowspan="1" colspan="1" class="text-nowrap">Request Status</th>
                                    <th rowspan="1" colspan="1" class="text-nowrap">Joined At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @unless (empty($request))
                                @foreach ($request as $user_request)
                                    @foreach ($users as $user)
                                        @php
                                            $join_date = Carbon::parse($user->created_at)->format('M-d');
                                        @endphp
                                        <tr>
                                            <td class="text-nowrap">
                                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                    <li class="avatar avatar-xs pull-up" data-bs-toggle="modal" data-bs-target="#id-{{ $user->id }}">
                                                        <img src="{{ asset($user->profile) }}" alt="Avatar" class="rounded-circle">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-nowrap">{{ $user->username }}</td>
                                            <td class="text-nowrap">{{ $user->email }}</td>
                                            <td class="text-nowrap">{{ $user_request->pay_through }}</td>
                                            <td class="text-nowrap">{{ $user_request->amount }}</td>
                                        
                                            
                                            <td>{{ $user->country }}</td>
                                            <td class="text-nowrap">
                                                @if ($user_request->status == 'Approved')
                                                    <span class="badge bg-label-success me-1">{{ $user_request->status }}</span>
                                                @endif
                                                @if ($user_request->status == 'Pending')
                                                    <span class="badge bg-label-danger me-1">{{ $user_request->status }}</span>
                                                    <a href="{{ route('WithdrawalApprove', ['request_id' => $user_request->id, 'amount' => $user_request->amount]) }}"><button class="btn btn-primary btn-sm">Approve</button></a>
                                                @endif
                                            </td>
                                            <td class="text-nowrap">{{ $join_date }}</td>
                                            @include('admin.components.edit-user-model')
                                        </tr>
                                    @endforeach
                                    @endforeach
                                @else
                                    <h4 class="text-primary bold">No Users Found</h4>
                                @endunless
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end px-2 py-2">
            {{ $users->links('components.custom-pagination', ['paginator' => $users]) }}
        </div>
    </div>
</div>
<script>
    const alertBox = document.querySelector('.message-alert');
    if (alertBox) {
        setTimeout(() => {
            alertBox.classList.toggle("animate__bounceOutUp", !alertBox.classList.contains("animate__bounceOutUp"));
        }, 4000);
    }
</script>

@endsection
