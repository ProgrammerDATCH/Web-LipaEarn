@php
    use Carbon\Carbon;

    $current_time = Carbon::now();
@endphp


@section('header')
@section('title', 'Activate Users')
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
            title: '{{ $success }}',
        })
    </script>
@endif

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users /</span>Table</h4>
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Activate Users
                <span class="badge bg-label-danger me-1">{{ $users->count() }} Users</span>
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
                                    <th></th>
                                    <th class="text-nowrap">Profile</th>
                                    <th class="text-nowrap">Username</th>
                                    <th class="text-nowrap">Email</th>
                                    <th class="text-nowrap">Number</th>
                                    <th class="text-nowrap">First Name</th>
                                    <th class="text-nowrap">Last Name</th>
                                    <th class="text-nowrap">Pay Number</th>
                                    <th class="text-nowrap">Screenshot</th>
                                    <th class="text-nowrap">Country</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Joined At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @unless ($Proofs->isEmpty())
                                    @foreach ($Proofs as $index => $Proof)
                                        @php
                                            $join_date = Carbon::parse($Proof->user->created_at)->format('M-d');
                                        @endphp
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="text-nowrap">
                                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                    <li class="avatar avatar-xs pull-up" data-bs-toggle="modal" data-bs-target="#id-{{ $Proof->user->id }}">
                                                        <img src="{{ asset($Proof->user->profile) }}" alt="Avatar" class="rounded-circle">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-nowrap">{{ $Proof->user->username }}</td>
                                            <td class="text-nowrap">{{ $Proof->user->email }}</td>
                                            <td class="text-nowrap">{{ $Proof->user->number }}</td>
                                            <td class="text-nowrap">{{ $Proof->first_name }}</td>
                                            <td class="text-nowrap">{{ $Proof->last_name }}</td>
                                            <td class="text-nowrap">{{ $Proof->pay_number }}</td>
                                            <td class="text-nowrap">
                                                <div class="avatar avatar-xs" data-bs-toggle="modal" data-bs-target="#imageModal-{{ $Proof->id }}">
                                                    <img src="{{ asset($Proof->screenshot) }}" alt="screenshot" class="rounded-circle">
                                                </div>
                                            </td>
                                            <td>{{ $Proof->user->country }}</td>
                                            <td class="text-nowrap">
                                                @if ($Proof->user->status == 'Active')
                                                    <span class="badge bg-label-success me-1">{{ $Proof->user->status }}</span>
                                                @endif
                                                @if ($Proof->user->status == 'Pending')

                                                    <form action="{{ route('OpenedNotification', ['id' => Auth()->user()->id]) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn" title="mark as read"><i class="bx fs-4 bx-envelope-open"></i></button type="submit"><br>
                                                        <small>Mark as read</small>
                                                    </form>


                                                    <span class="btn btn-sm btn-danger me-1">Reject</span>
                                                    <span class="badge bg-label-primary me-1">{{ $Proof->user->status }}</span>
                                                    <span class="btn btn-sm btn-primary me-1">Activate</span>
                                                @endif
                                            </td>
                                            <td class="text-nowrap">{{ $join_date }}</td>

                                            <x-edit-user-model :user="$Proof->user" />
                                        </tr>

                                                <div class="modal fade" id="imageModal-{{ $Proof->id }}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content py-1 px-1">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <img src="{{ asset($Proof->screenshot) }}" alt="screenshot">
                                                        </div>
                                                    </div>
                                                </div>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="12" class="text-center">
                                            <h4 class="text-primary bold">No Users Found</h4>
                                        </td>
                                    </tr>
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
