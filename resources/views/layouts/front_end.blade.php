<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="{{ asset('template/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('template/frontend/js/html5shiv.js') }}"></script>
    <script src="{{ asset('template/frontend/js/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('template/frontend/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('template/frontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('template/frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('template/frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('template/frontend/images/ico/apple-touch-icon-57-precomposed.png') }}">

    @yield('css')
</head>
<body>

@include('FrontEnd.components.header')

@yield('content')

@include('FrontEnd.components.footer')


<script src="{{ asset('template/frontend/js/jquery.js') }}"></script>
<script src="{{ asset('template/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/frontend/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('template/frontend/js/price-range.js') }}"></script>
<script src="{{ asset('template/frontend/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('template/frontend/js/main.js') }}"></script>
@yield('js')
</body>
</html>

