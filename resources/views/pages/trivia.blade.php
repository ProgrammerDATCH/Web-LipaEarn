@section('header')
    @php
        use Carbon\Carbon;
        
        $current_time = Carbon::now();
    @endphp
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
    <title>Trivia Quizes</title>
@endsection
<x-layout :notifications="$notifications" :notificationscounts="$notifications_counts">
    @if (session('success'))
        <x-slot name="alerts">
            <div class="alert alert-success message-alert animate__animated animate__bounceInDown">
                {{ session('success') }}
            </div>
        </x-slot>
    @endif

    <div class="container-xxl flex-grow-1 container-p-y">
  
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        @if (!empty($trivia))
                            <div class="col-lg-6">
                                <small class="text-light fw-semibold h4">Answer Question To Continue</small><br><br>
                                <small class="text-primary h4">{{ $trivia->question }} &nbsp; &nbsp; &nbsp;<span class="h4 text-success">{{$trivia->price}} FR</span></small>
                                <div class="col-xl-12">
                                    <div class="nav-align-top mb-4">
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <div class="demo-inline-spacing mt-3">
                                                    <div class="list-group">
                                                        <label class="list-group-item">
                                                            <input class="form-check-input me-1" type="radio" name="answer" checked>
                                                            {{ $trivia->option1 }}
                                                        </label>
                                                        <label class="list-group-item">
                                                            <input class="form-check-input me-1" type="radio" name="answer">
                                                            {{ $trivia->option2 }}
                                                        </label>
                                                        <label class="list-group-item">
                                                            <input class="form-check-input me-1" type="radio" name="answer">
                                                            {{ $trivia->option3 }}
                                                        </label>
                                                        <label class="list-group-item">
                                                            <input class="form-check-input me-1" type="radio" name="answer">
                                                            {{ $trivia->option4 }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-3" onclick="message()">Continue</button>
                            </div>
                            <script>
                                function message() {
            
                                    $(document).ready(function() {
                                        const trivia_price = '{{ $trivia->price }}';
                                        const trivia_id = '{{ $trivia->id }}';
                                        const csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token value from the meta tag
            
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': csrfToken // Set the CSRF token in the request headers
                                            }
                                        });
            
                                        $.post("{{ route('ClaimingRewardTrivia') }}", {
                                            trivia_price: trivia_price,
                                            trivia_id: trivia_id,
                                        }, function(data) {
                                            Swal.fire(
                                                'Good job!',
                                                `${data}`,
                                                'success'
                                            )
                                        });
                                    });
            
            
                                }
                            </script>
                        @else
                            <small class="text-light fw-semibold h4">No Trivias Available</small><br><br>
                            @if (!empty($watch_day))
                            Comeback {{$watch_day}}
                            @endif
                        @endif
                    </div>
                </div>

            </div>
            @section('scripts')
            <script src="{{ asset('js/extended-ui-sweetalert2.js') }}"></script>
            <script src="{{ asset('vendor/sweetalert2/sweetalert2.js') }}"></script>
            @endsection
</x-layout>
