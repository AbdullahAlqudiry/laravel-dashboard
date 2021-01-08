<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('home') }}" class=" logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>

                <a href="{{ route('home') }}" class=" logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-light.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="19">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            {{-- <form action="{{ request()->fullUrl() }}" class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" name="app_search" class="form-control" placeholder="البحث..." value="{{ request()->app_search }}">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form> --}}

        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            @if(auth()->user())

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-xl-inline-block ml-1" key="t-henry">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                    @can('user.profile.show')
                        <!-- item-->
                        <a class="dropdown-item" href="{{ route('user.profile.index') }}">
                            <i class="bx bx-user font-size-16 align-middle mr-1"></i>
                            <span key="t-profile">{{ __('trans.Profile Page Title') }}</span>
                        </a>
                    @endcan

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                        <span key="t-logout">{{ __('trans.Logout Page Title') }}</span>
                    </a>

                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            @else

            <div class="dropdown d-inline-block">
                <a href="{{ route('login') }}" class="btn header-item waves-effect">
                    <span class="d-xl-inline-block mt-3">{{ __('trans.Login Page Title') }}</span>
                </a>

                
            </div>

            @endif


        </div>
    </div>
</header>