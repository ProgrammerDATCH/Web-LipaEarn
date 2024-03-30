<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
            </div>
        </div>

        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown-user dropdown mr-10">
                <a class="nav-link dropdown-toggle hide-arrow mr-10" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class="bx bx-bell bx-sm"></i>
                    <span class="badge bg-danger rounded-pill badge-notifications">{{ $notificationscounts }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0" data-bs-popper="static">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Notification</h5>
                            <form action="{{ route('OpenedNotification', ['id' => Auth()->user()->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn" title="mark as read"><i class="bx fs-4 bx-envelope-open"></i></button type="submit"><br>
                                    <small>Mark as read</small>
                            </form>
                        </div>
                    </li>
                    @unless ($notificationscounts == 0)
                        @foreach ($notifications as $notification)
                            <li>
                                <a class="dropdown-item" href="{{ $notification->link }}">
                                    <span class="badge badge-dot bg-success"></span>
                                    &nbsp;
                                    <span class="align-middle">{{ $notification->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li>
                            <a class="dropdown-item" href="#">
                                &nbsp;
                                <span class="align-middle">No New Notifications</span>
                            </a>
                        </li>
                    @endunless

                </ul>
            </li>
            <style>
                .avatar img {
                    object-fit: cover;
                    -o-object-fit: cover;
                    object-position: center;
                    -o-object-position: center;
                }
            </style>
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown px-2">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online big-screen avatar-drop-down-account">
                        <img src="{{ asset(Auth()->user()->profile) }}" alt="user-icon" class="object-fit-cover rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online big-screen avatar-drop-down-account">
                                        <img src="{{ asset(Auth()->user()->profile) }}" alt="user-icon" class="object-fit-cover rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ Auth()->user()->username }}</span>
                                    <small class="text-muted">{{ Auth()->user()->role }}</small>
                                </div>
                            </div>
                        </a>

                        @if (Auth()->user()->role === 'Admin')
                            <hr>
                            <a class="text-primary dropdown-item" href="{{ route('admin') }}">
                                <i class="fas fa-user-shield"></i>
                                Visit Admin
                            </a>
                        @endif
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('ShowHelpPage') }}">
                            <i class="menu-icon mdi mdi-chat-question"></i>
                            <span class="align-middle">Help</span>
                        </a>
                    </li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <span class="d-flex align-items-center align-middle">
                            <form action="{{ route('logout') }}" method="POST" style="display: inline" class="dropdown-item">
                                @csrf
                                @method('POST')
                                <button class="btn btn-outline-danger col-12" href="{{ route('logout') }}" type="submit"><i class="bx bx-log-out-circle me-1"></i>Logout</button>
                            </form>
                        </span>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
