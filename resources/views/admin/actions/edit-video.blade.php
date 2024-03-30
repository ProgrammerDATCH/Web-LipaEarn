@section('header')
@section('title', 'Upload Tiktok Video')
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
@if ($success = Session::get('success'))
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
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Edit Video</h5>
            <div class="card-body">
                <form action="{{ route('EditVideo', ['id' => $video->id]) }}" method="post" id="form">
                    @method('PUT')
                    @csrf
                    <div data-repeater-list="group-a">
                        <div data-repeater-item>

                            <div class="row">
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-1">Title</label>
                                    <input type="text" id="form-repeater-1-1" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $video->title }}" />
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-3">Url</label>
                                    <input type="text" id="form-repeater-1-3" class="form-control @error('url') is-invalid @enderror" name="url" placeholder="https://www.youtube.com/watch?v=m53vqJ2IPuM" value="{{ $video->url }}" />
                                    @error('url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-4">Price</label>
                                    <div class="input-group">
                                        <input type="text" id="form-repeater-1-4" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $video->price }}" />
                                        <div class="btn border-1 btn-primary">FR</div>
                                    </div>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-4">Category</label>
                                    <select name="category" id="exampleFormControlSelect2" aria-label="Default select example" class="form-select cursor-pointer @error('category') is-invalid @enderror" name="category" value="{{ $video->category }}">
                                        <option value="Tiktok" {{ $video->category === 'Tiktok' ? 'selected' : '' }}>Tiktok</option>
                                        <option value="Youtube" {{ $video->category === 'Youtube' ? 'selected' : '' }}>Youtube</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-5">Watch Day</label>
                                    <select id="exampleFormControlSelect2" class="form-select cursor-pointer @error('watch_day') is-invalid @enderror" name="watch_day" value="{{ $video->watch_day }}">
                                        <option value="Monday" {{ $video->watch_day === 'Monday' ? 'selected' : '' }}>Monday</option>
                                        <option value="Tuesday" {{ $video->watch_day === 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                        <option value="Wednesday" {{ $video->watch_day === 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                        <option value="Thursday" {{ $video->watch_day === 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                        <option value="Friday" {{ $video->watch_day === 'Friday' ? 'selected' : '' }}>Friday</option>
                                        <option value="Saturday" {{ $video->watch_day === 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                        <option value="Sunday" {{ $video->watch_day === 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                    </select>
                                    @error('watch_day')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                    <button class="btn btn-label-danger mt-4" type="reset">
                                        <i class="bx bx-x me-1"></i>
                                        <span class="align-middle">Reset</span>
                                    </button>
                                </div>
                            </div>


                            <hr>
                        </div>
                    </div>
                    <div class="mb-0 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class='bx bx-cloud-upload me-1'></i>
                            <span class="align-middle">Done Edit</span>
                        </button>
                    </div>
                </form>
        </div>
    </div>
</div>
@include('partials._auth-scripts')
@endsection
@section('scripts')
<script src="{{ asset('vendor/jquery-repeater/jquery-repeater.js') }}"></script>
@endsection
