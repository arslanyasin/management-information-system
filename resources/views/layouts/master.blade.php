<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">


    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

    <!-- Tagsinput CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
    @yield('style')
</head>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">-->
<!--    <meta name="robots" content="noindex, nofollow">-->
<!--    <meta name="csrf-token" content="{{ csrf_token() }}">-->
<!--    <title>@yield('title')</title>-->
<!--    <!-- Favicon -->-->
<!--    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/xMatch_logo.png') }}">-->
<!--    <!-- Bootstrap CSS -->-->
<!--    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">-->
<!--    <!-- Fontawesome CSS -->-->
<!--    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">-->
<!--    <!-- Lineawesome CSS -->-->
<!--    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">-->
<!--    <!-- Datetimepicker CSS -->-->
<!--    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">-->
<!--    <!-- Toastr Css -->-->
<!--    <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">-->
<!--    <!-- Main CSS -->-->
<!--    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">-->
<!--    <!-- Custom CSS -->-->
<!--    @yield('style')-->
<!--</head>-->
<body>
    <div class="main-wrapper">
        {{--    Header    --}}
        @include('layouts.header')
        {{--    Sidebar    --}}
        @include('layouts.sidebar')
        {{--    Content    --}}
        @yield('content')
    </div>
</body>
<!-- Jquery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Core JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Slimscroll JS -->
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<!-- Datetimepicker JS -->
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Ck Editor -->
<script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
<!-- Toastr JS -->
<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
<!-- Toastify JS -->
<script src="{{asset('assets/plugins/toastify/src/toastify.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>
<!-- Custom Scripts -->

<!--<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>-->


<!-- Slimscroll JS -->
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Select2 JS -->
<script src="{{asset('assets/js/select2.min.js')}}"></script>

@yield('scripts')
</html>
