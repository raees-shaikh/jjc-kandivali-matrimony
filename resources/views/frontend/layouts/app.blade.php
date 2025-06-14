<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') JJC Kandivali Matrimony App </title>
    @include('frontend.layouts.header')
    @yield('cdn')
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{url('frontend/image/icons/favicon.png')}}">
</head>

<body>
    @include('frontend.layouts.nav')

    @yield('content')

    @include('frontend.layouts.footer')

    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    @yield('js')
</body>

</html>
