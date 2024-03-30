@php
    use Carbon\Carbon;
    
    $current_time = Carbon::now();
@endphp
@php
    $join_date = Carbon::parse($user->created_at)->format('M d');
@endphp
<div class="row mt-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <img src="{{ asset($user->profile) }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4>{{ $user->username }}</h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                <li class="list-inline-item fw-semibold">
                                    <i class="bx bx-pen"></i> {{ $user->role }}
                                </li>
                                <li class="list-inline-item fw-semibold">
                                    <i class="bx bx-map"></i> {{ $user->country }}
                                </li>
                                <li class="list-inline-item fw-semibold">
                                    <i class="bx bx-calendar-alt"></i> {{ $join_date }}
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('admin.delete', ['id' => $user['id']]) }}" class="btn btn-danger text-nowrap">
                            <i class="bx bx-trash me-1"></i>Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
