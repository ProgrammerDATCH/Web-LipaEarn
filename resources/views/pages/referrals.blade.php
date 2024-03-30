@section('header')
    <title>Referrals</title>
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
@endsection
@php
    use Carbon\Carbon; 
    $current_time = Carbon::now();
@endphp
<x-layout :notifications="$notifications" :notificationscounts="$notifications_counts">
    @if (session('success'))
        <x-slot name="alerts">
            <div class="alert alert-success message-alert animate__animated animate__bounceInDown">
                {{ session('success') }}
            </div>
        </x-slot>
    @endif
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Referrals /</span>Table</h6>

        <div class="card">
            <div class="header d-flex justify-content-between align-items-center  px-2">
                <h5 class="card-header">Referrals</h5>
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
                                    <th>Referral Name</th>
                                    <th>Status</th>
                                    <th class="cell-fit">Join Date</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if (!empty($users))
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-sm me-2"><img src="{{ asset($user->profile) }}" alt="Avatar" class="rounded-circle"></div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-body text-truncate fw-semibold">{{ $user->username }}</a>
                                                        <small class="text-truncate text-muted">{{ $user->email }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($user->status == 'Active')
                                                    <span class="badge bg-label-success">{{ $user->status }} </span>
                                                @else
                                                    <span class="badge bg-label-danger">{{ $user->status }} </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $user->created_at->format('M-d') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <div class="d-flex justify-content-end px-2 py-2">
                                        <div class="mx-2">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#referAndEarn">Refer Others</button>
                                        </div>
                                        {{ $users->links('components.custom-pagination', ['paginator' => $users]) }}
                                    </div>
                                @else
                                    <div class="d-flex col-12 justify-content-center">
                                        <span class="h6 text-muted text-center">
                                            You Have Not Referred Any One Refer With This Link <br>
                                            <i class="bx bx-chevron-down"></i>
                                        </span>

                                    </div>
                                    <div class="d-flex col-12 justify-content-center py-3 px-3">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#referAndEarn">Refer Now </button>
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
