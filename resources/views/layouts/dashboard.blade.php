<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/owl-carousel.min.css')}}">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('css/style.css')}}" rel="stylesheet">
    <link href="{{ url('css/responsive.css')}}" rel="stylesheet">
  </head>
<body>
<div class="dash-wrapper">
    <div class="left-sidebar">
        <div class="logo">
            <a>
                <img src="{{ url('asset/logo.png') }}" alt="">
            </a>
        </div>
        <h5>User Panel</h5>
        <ul>
            <li>
                <a href="{{ route('dashboard') }}" class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                    <img src="{{ url('asset/material-symbols_dashboard-outline.png') }}" alt="">
                     <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('challenges') }}" class="{{ Route::currentRouteName() == 'challenges' ? 'active' : '' }}">
                    <img src="{{ url('asset/Discover.png') }}" alt="">
                     <span>Challenges</span>
                </a>
            </li>
            <li>
                <a href="{{ route('challenge.index') }}" class="{{ Route::currentRouteName() == 'challenge.index' ? 'active' : '' }}">
                    <img src="{{ url('asset/Mask group.png') }}" alt="">
                     <span>My Challenges</span>
                </a>
            </li>
            <li>
                <a href="{{ route('stream') }}" class="{{ Route::currentRouteName() == 'stream' ? 'active' : '' }}">
                    <img src="{{ url('asset/Mask group (1).png') }}" alt="">
                     <span>Stream</span>
                </a>
            </li>
            <li>
                <a href="{{ route('leaderboard') }}" class="{{ Route::currentRouteName() == 'leaderboard' ? 'active' : '' }}">
                    <img src="{{ url('asset/Award.png') }}" alt="">
                    <span> Leaderboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('social-feed-details') }}" class="{{ Route::currentRouteName() == 'social-feed-details' ? 'active' : '' }}">
                    <img src="{{ url('asset/Mask group (2).png') }}" alt="">
                    <span> Social Feed</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="">
                    <img src="{{ url('asset/Celebrities.png') }}" alt="">
                     <span>Rewards</span>
                </a>
            </li>
            <li>
            <a  href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <img src="{{ url('asset/Log Out.png') }}" alt="">
                            <span>{{ __('Logout') }}</span>
                            
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
            </form>
            </li>
        </ul>

    </div>
    <div class="right-dash">
        <div class="top-bar">
            <p>Hello {{ Auth::user()->name }},</p>
            <div class="right-info">
                <a class="ac-btn-blue">Live Now</a>
                <a class="notification"><img src="{{ url('asset/notification.png') }}" alt="Notifications"></a>
                <div class="user-info">
                    <img src="{{ Auth::user()->avatar ? url('storage/' . Auth::user()->avatar) : url('asset/default-avatar.png') }}" alt="User Avatar">
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</div>
</body>
@yield('lv_footer')

</html>
