<!doctype html>
<html lang="ar" dir="rtl">

    <head>
        @include('components.layouts.head', ['title' => empty($title) ? null : $title])
    </head>
    
    <body>

        <div class="account-pages my-5 pt-sm-5">

            <div class="container">

                {{ $slot }}
                
            </div>

        </div>

        <div class="rightbar-overlay"></div>

        @include('components.layouts.scripts')

    </body>
</html>
