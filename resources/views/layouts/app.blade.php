<!-- Price box minimal--><!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-J8WM397NKQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-J8WM397NKQ');
    </script>

    <title>{{ config('app.name', 'XEOL') }} | @yield('title','XEOL')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {!! OpenGraph::renderTags() !!}

    <link rel="apple-touch-icon" sizes="180x180" href="{{url('assets/images/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('assets/images/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('assets/images/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{url('assets/images/favicons/site.webmanifest')}}">

    <!-- plugin scripts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,500i,600,700,800%7CSatisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/plugins/fontawesome-free-5.11.2-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/plugins/kipso-icons/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/vegas.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap4/css/bootstrap.css')}}">

    <!-- template styles -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/responsive.css')}}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166193936-1"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}
{{--        function gtag(){dataLayer.push(arguments);}--}}
{{--        gtag('js', new Date());--}}

{{--        gtag('config', 'UA-166193936-1');--}}
{{--    </script>--}}

{{--    <link rel="stylesheet" type="text/css" href={{url("//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900")}}>--}}
{{--    <link rel="icon" href="images/favicon.ico" type="image/x-icon">--}}
    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
    <link rel="icon" href="{{url('images/favicon.ico?v=2')}}" type={{url("image/x-icon")}}>

{{--    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">--}}
{{--    <link rel="stylesheet" href={{url("fonts/fonts.css")}}>--}}
{{--    <link rel="stylesheet" href={{url("css/style.css")}}>--}}
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>
<body>

<main role="main">
    @yield('content')
</main>

<div class="snackbars" id="form-output-global"></div>
{{--<script src="{{url('js/core.min.js')}}"></script>--}}
{{--<script src="{{url('js/script.js')}}"></script>--}}
<script defer src="https://www.google.com/recaptcha/api.js" async></script>
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{url('assets/js/waypoints.min.js')}}"></script>
<script src="{{url('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{url('assets/js/TweenMax.min.js')}}"></script>
<script src="{{url('assets/js/wow.js')}}"></script>
<script src="{{url('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('assets/js/countdown.min.js')}}"></script>
<script src="{{url('assets/js/vegas.min.js')}}"></script>

<script src="{{url('/bootstrap4/js/bootstrap.js')}}"></script>
<script src="{{url('bootstrap4/js/bootstrap.bundle.js')}}"></script>

<!-- template scripts -->
<script src="{{url('assets/js/theme.js')}}"></script>

<script src="{{asset('tiac/src/jquery.tagsinput-revisited.js')}}"></script>
<link rel="stylesheet" href="{{asset('tiac/src/jquery.tagsinput-revisited.css')}}">

<script src="{{url('js/main.js')}}"></script>

</body>
</html>
