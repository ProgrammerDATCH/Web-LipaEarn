@section('header')
@section('title', 'Upload Trivia Quizzes')
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
            <div class="card-body">
                <div class="row">
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Upload Trivia</small>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <ul>
                                                <li>{{ $error }}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                @endif
                                <form action="{{ route('UploadTrivia') }}" method="post" id="form">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="question">Question</label>
                                        <input type="text" class="form-control" id="question" placeholder="Question" name="question" value="{{old('question')}}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="CorrectAnswer">Correct Answer</label>
                                        <input type="text" class="form-control" id="CorrectAnswer" placeholder="Correct Answer" name="correct_answer" value="{{old('correct_answer')}}" />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="option1">Option 1</label>
                                            <input type="text" class="form-control" id="option1" placeholder="Option 1" name="option1" value="{{old('option1')}}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="option2">Option 2</label>
                                            <input type="text" class="form-control" id="option2" placeholder="Option 2" name="option2" value="{{old('option2')}}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="option3">Option 3</label>
                                            <input type="text" class="form-control" id="option3" placeholder="Option 3" name="option3" value="{{old('option3')}}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="option4">Option 4</label>
                                            <input type="text" class="form-control" id="option4" placeholder="Option 4" name="option4" value="{{old('option4')}}" />
                                        </div>
                                        <div class="mb-3 col-lg-6 col-xl-6 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-1-5">Watch Day</label>
                                            <select  id="exampleFormControlSelect2" class="form-select cursor-pointer @error('watch_day') is-invalid @enderror" name="watch_day" value="{{ old('watch_day') }}">
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
                                        <div class="mb-3 col-lg-6 col-xl-6 col-12 mb-0">
                                            <label class="form-label" for="form-repeater-1-4">Price</label>
                                            <div class="input-group">
                                                <input type="text" id="form-repeater-1-4" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" />
                                                <div class="btn border-1 btn-primary">FR</div>
                                            </div>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 btn-lg">Add</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials._auth-scripts')
@endsection
@section('scripts')
<script src="{{ asset('vendor/jquery-repeater/jquery-repeater.js') }}"></script>
<script src="{{ asset('js/forms-extras.js') }}"></script>
@endsection
