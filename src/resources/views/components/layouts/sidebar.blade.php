<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <!-- Left Menu Start -->

            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">{{ __('trans.Side Bar.Main Menu') }}</li>

            </ul>

            @if(auth()->user())
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">{{ __('trans.Side Bar.Manage System') }}</li>

                    @can('dashboard.system.statistics.show')
                    <li>
                        <a href="{{ route('dashboard.system.statistics.index') }}" class=" waves-effect">
                            <i class="bx bx-file"></i>
                            <span>{{ __('trans.Statistics Page Title') }}</span>
                        </a>
                    </li>
                    @endcan
                    
                    @can('dashboard.system.users.show')
                    <li>
                        <a href="{{ route('dashboard.system.users.index') }}" class=" waves-effect">
                            <i class="bx bx-user"></i>
                            <span>{{ __('trans.Users Page Title') }}</span>
                        </a>
                    </li>
                    @endcan

                    @can('dashboard.system.roles.show')
                    <li>
                        <a href="{{ route('dashboard.system.roles.index') }}" class=" waves-effect">
                            <i class="mdi mdi-forum"></i>
                            <span>{{ __('trans.Roles Page Title') }}</span>
                        </a>
                    </li>
                    @endcan

                    @can('dashboard.system.web-services.show')
                    <li>
                        <a href="{{ route('dashboard.system.web-services.index') }}" class=" waves-effect">
                            <i class="bx bx-server"></i>
                            <span>{{ __('trans.Web Services Page Title') }}</span>
                        </a>
                    </li>
                    @endcan

                    @can('dashboard.system.settings.show')
                    <li>
                        <a href="{{ route('dashboard.system.settings.index') }}" class=" waves-effect">
                            <i class="bx bx-cog"></i>
                            <span>{{ __('trans.Settings Page Title') }}</span>
                        </a>
                    </li>
                    @endcan

                </ul>
            @endif

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->