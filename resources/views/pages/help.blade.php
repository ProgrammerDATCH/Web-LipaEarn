@section('header')
    <title>Help</title>
    <style>
        #chat2 .form-control {
            border-color: transparent;
        }

        #chat2 .form-control:focus {
            border-color: transparent;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
    <style>
        .avatar img{
            object-fit: cover;
            -o-object-fit: cover;
            object-position: center;
            -o-object-position: center;
        }
    </style>
@endsection
<x-layout :notifications="$notifications" :notificationscounts="$notifications_counts">
    <section class="container-xxl container-p-y  justify-content-center">
        <div class="card" id="chat2">
            <div class="card-header d-flex justify-content-between align-items-center p-3">
                <h5 class="mb-0">Chat</h5>
            </div>
            <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 200px;" id="vertical-example">
                <div class="d-flex flex-row justify-content-start">
                    <div class="avatar avatar-online big-screen">
                        <img src="{{ asset('storage/images/avatars/user-1.jpg') }}" alt="avatar 3" class="rounded-circle avatar img">
                    </div>
                    <div>
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">How Can I Help You</p>
                    </div>
                </div>
                {{-- <div class="d-flex flex-row justify-content-end">
                    <div>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Okay then see you on sunday!!
                        </p>
                        <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:15</p>
                    </div>
                    <img src="{{ asset(Auth()->user()->profile) }}" alt="avatar 3" class="rounded-circle avatar img">
                </div> --}}


            </div>
            <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                <img src="{{ asset(Auth()->user()->profile) }}" alt="avatar 3" class="rounded-circle avatar img">
                <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Type message">
                <button class="btn-primary btn">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>

        </div>

    </section>
</x-layout>
