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
            <h5 class="card-header">Tiktok Upload</h5>
            <div class="card-body">
                @unless (count($videos) == 0)
                <div class="table-responsive">
                    <table class="dt-column-search table table-bordered dataTable table-responsive-lg">
                        <thead>
                            <tr>
                                <th class="p-2 text-center">Video Title</th>
                                <th class="p-2 text-center">Video Url</th>
                                <th class="p-2 text-center">Video Price</th>
                                <th class="p-2 text-center">Video Watch Day</th>
                                <th class="p-2 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <td class="p-2 text-center">{{ $video->title }}</td>
                                    <td class="p-2 text-center">{{ $video->url }}</td>
                                    <td class="p-2 text-center">{{ $video->price }}</td>
                                    <td class="p-2 text-center">{{ $video->watch_day }}</td>
                                    <td class="p-2 text-center">
                                        <form action="{{ route('deleteVideo', ['id' => $video->id]) }}" method="post" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger bx bx-trash">
                                            </button>
                                        </form>
                                        <a href="{{ route('ShowEditVideo', ['id' => $video->id]) }}" class="btn btn-primary bx bx-edit">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <div class="mb-3">
                        <span class="h3 text-primary">No Video Found</span>
                    </div>
                @endunless
                <form action="{{ route('UploadTiktok') }}" method="post" id="form">
                    @csrf
                    <div data-repeater-list="group-a">
                        <div data-repeater-item>

                            <div class="row">
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-1">Title</label>
                                    <input type="text" id="form-repeater-1-1" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" />
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-3">Url</label>
                                    <input type="text" id="form-repeater-1-3" class="form-control @error('url') is-invalid @enderror" name="url" placeholder="https://www.youtube.com/watch?v=m53vqJ2IPuM" value="{{ old('url') }}" />
                                    @error('url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-4">Price</label>
                                    <div class="input-group">
                                        <input type="text" id="form-repeater-1-4" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" />
                                        <div class="btn border-1 btn-primary">FR</div>
                                    </div>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-4">Category</label>
                                    <select name="category" id="exampleFormControlSelect2" aria-label="Default select example" class="form-select cursor-pointer @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}">
                                        <option value="Tiktok">Tiktok</option>
                                        <option value="Youtube">Youtube</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-5">Watch Day</label>
                                    <select id="exampleFormControlSelect2" class="form-select cursor-pointer @error('watch_day') is-invalid @enderror" name="watch_day" value="{{ old('watch_day') }}">
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                    </select>
                                    @error('watch_day')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                    <button class="btn btn-label-danger mt-4" type="reset">
                                        <i class="bx bx-x me-1"></i>
                                        <span class="align-middle">Delete</span>
                                    </button>
                                </div>
                            </div>


                            <hr>
                        </div>
                    </div>
                    <div class="mb-0 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" onclick="submit()">
                            <i class='bx bx-cloud-upload me-1'></i>
                            <span class="align-middle">Upload</span>
                        </button>
                    </div>
                </form>
                <script>
                    function submit() {
                        document.getElementById('id').submit();
                    }
                </script>
            </div>
        </div>
    </div>
</div>
@include('partials._auth-scripts')
@endsection
@section('scripts')
<script src="{{ asset('vendor/jquery-repeater/jquery-repeater.js') }}"></script>
<script src="{{ asset('js/forms-extras.js') }}"></script>
<script>
    const alertBox = document.querySelector('.message-alert-upload');
    if (alertBox) {
        setTimeout(() => {
            alertBox.classList.toggle("animate__bounceOutRight", !alertBox.classList.contains("animate__bounceOutRight"));
        }, 4000);
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 4700);
    }
</script>
@endsection
