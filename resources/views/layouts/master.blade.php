<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/xMatch_logo.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <!-- Toastr Css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Custom CSS -->
    @yield('style')
</head>
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
<!-- Custom Scripts -->
@yield('scripts')
</html>
