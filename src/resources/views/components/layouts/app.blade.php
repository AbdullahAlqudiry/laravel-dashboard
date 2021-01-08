<!doctype html>
<html lang="ar" dir="rtl">

    <head>
        @include('components.layouts.head', ['title' => empty($title) ? null : $title])
        @livewireStyles

        @stack('styles')
        @yield('styles')

    </head>

    
    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('components.layouts.header')


            @include('components.layouts.sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                </div>

                @include('components.layouts.footer')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        @include('components.layouts.scripts')

        @livewireScripts

        @stack('scripts')
        @yield('scripts')

        <script>
            $(function() {
                window.addEventListener('toastr-alert', event => {
                    toastr[event.detail.type](event.detail.message);
                });

                @if ($alert = Session::get('toastr-alert'))
                    toastr['{{ $alert['type'] }}']('{{ $alert['message'] }}');
                @endif
            });
        </script>

    </body>
</html>
