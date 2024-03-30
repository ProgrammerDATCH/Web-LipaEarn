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
                <form style="display: inline">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..."  name="search"/>
                </form>
            </div>
        </div>
        
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <style>
                .avatar img{
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
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online big-screen avatar-drop-down-account">
                                       <img src="{{ asset(Auth()->user()->profile) }}" alt="user-icon" class="object-fit-cover rounded-circle" />

                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{Auth()->user()->username}}</span>
                                    <small class="text-muted">{{Auth()->user()->role}}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a class="dropdown-item" href="{{ route('ShowDashboard') }}">
                            <i class="fas fa-user-shield"></i>
                            Visit Users Dash
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('profile')}}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('ShowHelpPage')}}">
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
