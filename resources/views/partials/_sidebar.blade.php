<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo d-flex align-items-center justify-content-center">
        <a href="{{route('ShowDashboard')}}" class="app-brand-link">
            <img src="{{ asset('storage/images/logo_old.svg') }}" class="w-50 h-auto" />
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner  py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{route('ShowDashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="{{route('ShowWithdrawalForm')}}" class="menu-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="menu-icon feather feather-download">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
                <div data-i18n="Layouts">Withdrawal</div>
            </a>
        </li>

        <li class="menu-header small">
            <span class="menu-header-text">Earn</span>
        </li>
        <li class="menu-item">
            <a href="{{route('ShowWatchYoutubePage')}}" class="menu-link">
                <i class="menu-icon fa-sharp fa-brands fa-youtube"></i>
                <div>Watch Youtube Video</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('ShowWatchTiktokPage')}}" class="menu-link">
                <i class="menu-icon fa-sharp fa-brands fa-tiktok"></i>
                <div>Watch Tiktok Video</div>
            </a>

        </li>
        <li class="menu-item">
            <a href="{{route('ShowSpinPage')}}" class="menu-link">
                <i class="menu-icon fa-sharp fa-solid fa-dharmachakra"></i>
                <div data-i18n="Misc">Welcome Spin</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('ShowTriviasPages')}}" class="menu-link">
                <i class="menu-icon fa-sharp fa-solid fa-comments-dollar"></i>
                <div data-i18n="Misc">Trivia Quiz</div>
            </a>
        </li>
        <!-- Components -->
        <li class="menu-header small"><span class="menu-header-text">Social Media Earn</span></li>
        <!-- Cards -->
        <li class="menu-item">
            <a href="{{route('ShowCreateBoostingAccountPage')}}" class="menu-link">
                <i class="menu-icon fas fa-circle-dollar-to-slot"></i>
                <div data-i18n="Basic">Boost Your Accounts</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('ShowInstagramBoostingPage')}}" class="menu-link">
                <i class="menu-icon fa-brands fa-instagram"></i>
                <div data-i18n="Basic">Boost Your Instagram</div>
            </a>
        </li>
        <!-- User interface -->
        <li class="menu-item">
            <a href="{{route('ShowYoutubeBoostingPage')}}" class="menu-link">
                <i class="menu-icon fa-sharp fa-brands fa-youtube"></i>
                <div data-i18n="User interface">Boost Your Youtube</div>
            </a>
        </li>

        <!-- Extended components -->
        <li class="menu-item">
            <a href="{{route('ShowTiktokBoostingPage')}}" class="menu-link">
                <i class="menu-icon fa-sharp fa-brands fa-tiktok"></i>
                <div data-i18n="Extended UI">Boos Your Tiktok</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('ShowBoosterPage')}}" class="menu-link">
                <i class="menu-icon fas fa-money-check-dollar"></i>
                <div data-i18n="Extended UI">My Boost Account</div>
            </a>
        </li>

        <!-- Forms & Tables -->
        <li class="menu-header small"><span class="menu-header-text">Team</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="{{route('ShowReferralsTables')}}" class="menu-link">
                <i class="menu-icon fa-sharp fas fa-users"></i>
                <div data-i18n="Form Elements">My Team</div>
            </a>
        </li>
        <!-- Misc -->
        <li class="menu-header small"><span class="menu-header-text">Setting</span></li>
        <li class="menu-item">
            <a href="{{route('profile')}}" class="menu-link">
                <i class="menu-icon fas fa-user-shield"></i>
                <div>Profile</div>
            </a>
        </li>
        {{-- <li class="menu-item">
            <a href="{{route('ShowHelpPage')}}" class="menu-link">
                <i class="menu-icon mdi mdi-chat-question"></i>
                <div>Help</div>
            </a>
        </li> --}}
        <li class="menu-item" style="opacity: 0; visibility:hidden;">
            <a href="{{route('ShowHelpPage')}}" class="menu-link">
                <i class="menu-icon mdi mdi-chat-question"></i>
                <div>Help</div>
            </a>
        </li>

        <li class="menu-item" style="opacity: 0; visibility:hidden;">
            <a href="{{route('ShowHelpPage')}}" class="menu-link">
                <i class="menu-icon mdi mdi-chat-question"></i>
                <div>Help</div>
            </a>
        </li>
        <li class="menu-item" style="opacity: 0; visibility:hidden;">
            <a href="{{route('ShowHelpPage')}}" class="menu-link">
                <i class="menu-icon mdi mdi-chat-question"></i>
                <div>Help</div>
            </a>
        </li>
    </ul>
</aside>
