@section('header')
    @php
        use Carbon\Carbon;
        
        $current_time = Carbon::now();
    @endphp
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
    <title>Create Boosting Account</title>
@endsection
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

        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-12">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Become Social</h5> <small class="text-muted float-end">Booster</small>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('CreateBoostingAccount') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="form-repeater-1-4">Category</label>
                                    <select name="category" id="exampleFormControlSelect2" aria-label="Default select example" class="form-select cursor-pointer @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}">
                                        <option value="youtube">Youtube</option>
                                        <option value="tiktok">Tiktok</option>
                                        <option value="instagram">Instagram</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-username">Username</label>
                                    <input type="text" class="form-control" id="basic-default-username" placeholder="Enter username you use on that booster account" name="username">
                                    @error('username')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-title">Title</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="basic-default-title" class="form-control" placeholder="Enter Title that will be displayed on your account" name="title">
                                        @error('title')
                                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-thumbnail">Profile Picture</label>
                                    <input type="file" id="basic-default-thumbnail" class="form-control thumbnail-mask" name="thumbnail">
                                    @error('thumbnail')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-link">Link</label>
                                    <textarea id="basic-default-link" class="form-control" placeholder="Link to your account" name="link"></textarea>
                                    @error('link')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
</x-layout>
