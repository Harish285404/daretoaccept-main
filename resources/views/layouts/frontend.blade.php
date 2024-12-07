<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/style.css')}}">        
    <link href="{{url('css/responsive.css')}}" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @endif
</head>
<body>

 <header>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="">
                    <img src="asset/logo.png" alt="">
                </a>
            </div>
            <div class="d-flex flex-wrap header-btn">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="ac-btn-blue">Dashboard</a>
                        <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a> -->

                    <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div> -->
                    @else
                        <a href="{{ route('login') }}" class="ac-btn-transparent">Log in</a>
                        <a href="{{ route('register') }}" class="ac-btn-blue">Sign up</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
 </header>
@yield('content')
<footer>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a class="footer-logo">
                    <img src="asset/logo.png" alt="">
                </a>
            </div>
            <div class="col-md-9">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla auctor massa ut metus dictum facilisis. Nunc eget erat ac nunc condimentum tempus vitae et dui. Vestibulum sem lorem, cursus id interdum et, cursus in lorem. Aliquam hendrerit lacinia mauris, a interdum orci aliquet nec.</p>
                </div>
     
        </div>
    </div>
    <div class="container copyright-text text-center">
        <p>© Copyright All Right Reserved</p>
    </div>
</footer>


<!-- <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ url('js/owl.carousel.min.js') }}"></script>
<script src="{{ url('js/custom.js') }}"></script> -->


</body>
</html>
