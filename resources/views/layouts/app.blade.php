<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{url('css/owl-carousel.min.css')}}">
        <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{url('css/style.css')}}">        
        <link href="{{url('css/responsive.css')}}" rel="stylesheet">
    </head>
<body>
    <div class="account-wrapper">
        @yield('content')
    </div>
    <script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{url('js/owl.carousel.min.js')}}"></script>
    <script src="{{url('js/custom.js')}}"></script>
</body>
</html>
