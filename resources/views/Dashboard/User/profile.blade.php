@extends('layouts.dashboard')

@section('content')

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
                <a href="">
                    <img src="{{ url('asset/material-symbols_dashboard-outline.png') }}" alt="">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ url('asset/Discover.png') }}" alt="">
                    Challenges
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ url('asset/Mask group.png') }}" alt="">
                    My Challenges
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ url('asset/Mask group (1).png') }}" alt="">
                    Stream
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ url('asset/Award.png') }}" alt="">
                    Leaderboard
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ url('asset/Mask group (2).png') }}" alt="">
                    Social Feed
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ url('asset/Celebrities.png') }}" alt="">
                    Rewards
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ url('asset/Log Out.png') }}" alt="">
                    Log Out
                </a>
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
    </div>

        <div class="right-bottom-dash">
            <div class="right-dash-inner my-profile-cs">
                <div class="heading d-flex justify-content-between align-items-center">
                    <h3>My Profile</h3>
                    <a href="" class="ac-btn-blue">Edit Profile</a>
                </div>
                <div class="profile-card">
                    <figure>
                        <img src="{{ url('asset/image.png') }}" alt="">
                    </figure>
                    <div class="profile-card-content">
                        <h3>Leo Carder</h3>
                        <p>Challenge Preference: <span>Gaming</span></p>
                    </div>
                </div>
                <div class="profile-info">
                    <h4>Bio:</h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                </div>
                <div class="profile-info w-40">
                    <h4>Challenge Preferences</h4>
                    <p>Lorem Ipsum</p>
                </div>
                <div class="profile-info w-40">
                    <h4>Social Media Links:</h4>
                    <ul class="social-links">
                        <li>
                            <a href=""><img src="{{ url('asset/icons.png') }}" alt=""> Facebook </a>
                        </li>
                        <li>
                            <a href=""><img src="{{ url('asset/icons-1.png') }}" alt=""> Instagram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


    @endsection