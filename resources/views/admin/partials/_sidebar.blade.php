<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('admin')}}" class="app-brand-link">
            <img src="{{ asset('storage/images/logo_old.svg') }}" class="w-50 h-auto" />
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner  py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{route('admin')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="{{route('RequestedWithdrawal')}}" class="menu-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="menu-icon feather feather-download">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
                <div data-i18n="Layouts">Request Withdrawal</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('webData')}}" class="menu-link menu-toggle">
                <i class="bx bx-user me-1 menu-icon"></i>
                <div data-i18n="Layouts">Web Users Data</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('webData')}}" class="menu-link">
                        <div data-i18n="Accordion">View All Users</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{route('viewActiveUsers')}}" class="menu-link">
                        <div data-i18n="Accordion">View Active</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('viewPendingUsers')}}" class="menu-link">
                        <div data-i18n="Alerts">View Pending</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('viewReferrals')}}" class="menu-link">
                        <div data-i18n="Alerts">View Referrals</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('viewNewUsers')}}" class="menu-link">
                        <div data-i18n="Alerts">View New Users</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('viewOldUsers')}}" class="menu-link">
                        <div data-i18n="Alerts">View Old Users</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small">
            <span class="menu-header-text">Earn</span>
        </li>
        <li class="menu-item">
            <a href="{{route('ShowYoutubeUploadPage')}}" class="menu-link">
                <i class="menu-icon fa-sharp fa-brands fa-youtube"></i>
                <div>Upload Youtube</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('ShowTiktokUploadPage')}}" class="menu-link">
                <i class="menu-icon fa-sharp fa-brands fa-tiktok"></i>
                <div>Upload Tiktok</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('ShowPaymentActivation')}}" class="menu-link">
                <i class="menu-icon bx bx-user-plus bx-sm"></i>
                <div>Payment Activation</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('ShowTriviaUploadPage')}}" class="menu-link">
                <i class="menu-icon fa-sharp fa-solid fa-comments-dollar"></i>
                <div>Upload Trivia Quiz</div>
            </a>
        </li>
    </ul>
</aside>
