@section('header')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
    <title>Boosting Page</title>
@endsection
<x-layout :notifications="$notifications" :notificationscounts="$notifications_counts">
    <div class="container-xxl flex-grow-1 container-p-y">
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
                    title: '{{ session('success') }}',
                })
            </script>
        @endif
        <div class="row g-4">
            @unless (count($users) == 0)
                @foreach ($users as $user)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="mx-auto mb-3 w-100 h-100">
                                    <img src="{{ asset($user->thumbnail) }}" alt="Avatar Image img-fluid" class=" rounded-1 w-px-100" />
                                </div>
                                <h5 class="mb-1 card-title">{{ $user->booster_username }}</h5>
                                <span>{{ $user->title }}</span>
                                <style>
                                    .bg-indigo {
                                        background-color: #6610f2;
                                        color: white
                                    }
                                    .bg-dark {
                                        color: white
                                    }
                                    .bg-danger {
                                        color: white
                                    }
                                </style>
                                <div class="d-flex align-items-center justify-content-center mt-4">
                                    <a href="{{ $user->link }}" class="btn  d-flex align-items-center me-3 {{ $color }}" target="_brank"><i class='bx bxl-{{ $user->category }}'></i> &nbsp;Follow</a>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle hide-arrow" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Done
                                        </button>
                                        <ul class="dropdown-menu">

                                            <form action="{{ route('BoosterAccountClicked', ['user_id' => $user->user_id, 'account_id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <li>
                                                    <div class="m-1 py-1 px-1">
                                                        <label for="screenshot small">Follow Screenshot</label>
                                                        <input type="file" class="form-control mt-1" name="screenshot" id="screenshot" placeholder="screenshot">
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="m-1 py-1 px-1">
                                                        <label for="screenshot small">Your Instagram Name</label>
                                                        <input type="text" class="form-control mt-1" name="name" id="name" placeholder="Youtube Channel Name">
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="m-1 py-1 px-1">
                                                        <button type="submit" class="btn btn-primary btn-sm">Send</button>
                                                    </div>
                                                </li>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="demo-inline-spacing mt-3 alert-danger  px-1 rounded-1" style="text-align: left !important">
                                        <ul class="list-group list-group-timeline">
                                            @foreach ($errors->all() as $error)
                                                <li class="list-group-item list-group-timeline-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-danger" role="alert">
                    <h4 class="text-black ">No Users Available</h4>
                    <a class="btn btn-primary" href="{{ route('ShowCreateBoostingAccountPage') }}">Become A booster</a>
                </div>
            @endunless
        </div>
    </div>
    @section('scripts')
        <script src="{{ asset('js/extended-ui-sweetalert2.js') }}"></script>
        <script src="{{ asset('vendor/sweetalert2/sweetalert2.js') }}"></script>
    @endsection
</x-layout>
