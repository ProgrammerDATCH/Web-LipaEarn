@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/plyr/plyr.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.css') }}" />
    @php
        use Carbon\Carbon;
        
        $current_time = Carbon::now();
    @endphp
    <title>Watch Tiktok</title>
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
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Watch And Earn/</span> Tiktok
        </h4>

        <div class="row">
            <!-- Video Player -->
            {{-- <div class="col-12 mb-4">
              <div class="card">
                <h5 class="card-header">Video</h5>
                <div class="card-body">
                  <video class="w-100" id="plyr-video-player" playsinline controls>
                    <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" />
                  </video>
                </div>
              </div>
            </div>
             --}}
            @if (!empty($video))
                @php
                    $end_date = Carbon::parse($video->end_at)->format('M d');
                    $start_date = Carbon::parse($video->created_at)->format('M d');
                @endphp
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="d-flex justify-content-between">
                            <div class="card-header  h5">{{ $video->title }}</div>
                        </div>
                        <div class="card-body">
                            <div class="tiktok-embed">
                                <iframe src="{{ $video->url }}" width="100%" height="300px" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                </div>
        </div>

        <div class="col-12 d-flex justify-content-end mt-4">
            <button class="btn btn-primary btn-lg" onclick="message()">
                Claim {{ $video->price }} RF
            </button>
        </div>
        <script>
            function message() {

                $(document).ready(function() {
                    const video_id = '{{ $video->id }}';
                    const csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token value from the meta tag

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Set the CSRF token in the request headers
                        }
                    });

                    $.post("{{ route('ClaimingRewardTiktok') }}", {
                        video_id: video_id,
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
        <div class="col-12 d-flex justify-content-end">
            <div class="btn btn-primary btn-lg col-12">
                No Video Available <br>
                @if (!empty($watch_day))
                Comeback {{$watch_day}}
                @endif
            </div>          
        </div>

        <a class="col-12 d-flex justify-content-end mt-4" href="{{ route('ShowDashboard') }}">
            <button class="btn btn-primary btn-lg">
                Back Home
            </button>
        </a>
        @endif
    </div>
    @section('scripts')
        <script src="{{ asset('vendor/plyr/plyr.j') }}s"></script>
        <script src="{{ asset('js/extended-ui-media-player.js') }}"></script>
        <script src="{{ asset('js/extended-ui-media-player.js') }}"></script>
        <script src="{{ asset('js/extended-ui-sweetalert2.js') }}"></script>
        <script src="{{ asset('vendor/sweetalert2/sweetalert2.js') }}"></script>
    @endsection

</x-layout>
