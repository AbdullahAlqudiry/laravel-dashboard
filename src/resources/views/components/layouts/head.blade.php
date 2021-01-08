<base href="{{ url('/') }}">

<meta charset="utf-8" />
<title>{{ is_null($title) ? config('app.name') : $title . ' | ' . config('app.name') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />

<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- Select2 -->
<x-css :path="mix('assets/libs/select2/select2.min.css')"/>

<!-- Toastr Css -->
<x-css :path="mix('assets/libs/toastr/toastr.min.css')"/>

<!-- Sweetalert2 Css -->
<x-css :path="mix('assets/libs/sweetalert2/sweetalert2.min.css')"/>

<!-- Bootstrap Css -->
<x-css :path="mix('assets/css/bootstrap.min.css')"/>
<!-- Icons Css -->

<x-css :path="mix('assets/css/icons.min.css')"/>

<!-- App Css-->
<x-css :path="mix('assets/css/app-rtl.min.css')"/>