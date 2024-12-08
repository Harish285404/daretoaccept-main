@extends('layouts.app')

@section('content')
<style>
    .text-danger {
    padding-left: 66px;
}
.invalid-feedback{
    padding-left: 66px;
}
    </style>
    <!-- Section  login-->
    <section class="login-layout">
        <div class="login-form w-50">
            <div class="authentication d-flex align-items-center justify-content-center">
                <!-- User Form -->
                <div class="authentication-form">
                    <!-- Authentication Box -->
                    <div class="authentication-form-box">
                        <!-- Logo -->
                        <div class="logo">
                            <img src="assets/images/login-img/logo.png" class="logo-img" alt="#">
                        </div>
                        <!-- //Logo -->
                        <div class="login-heading">
                            <h2 class="title">Log in to your account</h2>
                            <span>Welcome back! Select method to log in:</span>
                        </div>
                        <div class="media-login">
                            <a class="media-link" href="{{route('auth.socialite.redirect','google')}}">
                                <img src="assets/images/login-img/icon_google.png" alt="#">
                                <p>Continue With Google</p>
                            </a>
                            <a class="media-link" href="{{route('auth.socialite.redirect','facebook')}}">
                                <img src="assets/images/login-img/logos_facebook.png" alt="#">
                                <p>Continue With Facebook</p>
                            </a>
                        </div>
                        <div class="divider-title">
                            <span class="line-text">Or continue with</span>
                        </div>
                        <!-- Login Form -->
                        <form method="POST" class="login-detail" action="{{ route('login') }}"  id="loginForm">
                            <!-- User Field -->
                            @csrf 
                            <div class="form-container">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="Username">Email Address</label>
                                    <div class="input-icon-group">
                                        <input id="email" type="email" class="form-control py-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                        <span class="input-icon">
                                            <img src="assets/images/login-img/user.png" alt="#">
                                        </span>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div id="email-error" class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="Password">Password</label>
                                    <div  class="input-icon-group">
                                    <input id="password" type="password" class="form-control  py-3 @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                                    <div id="password-error" class="text-danger"></div>    
                                    <span class="input-icon lock">
                                            <img src="assets/images/login-img/password.png" alt="#">
                                        </span>
                                        <span class="eye">
                                            <img src="assets/images/login-img/eye-light.png" alt="#">
                                        </span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="action-label">
                                    <label>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a class="get-password" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <button class="login-btn btn w-100 mb-4 py-3" type="submit">Login</button>
                                </div>
                                <div class="create-account">
                                <span class="psw">Don’t have an account? <a href="{{ route('register') }}" class="create-new"> Create an account</a></span>
                                </div>
                            <div>
                            </div>
                            <!-- //Password Field -->
                        </form>
                    </div>
                </div>
                <!-- User Form -->
            </div>
        </div>
        <div class="login-form-right w-50">
            <img class="login-form-img" src="assets/images/login-img/login-banner.png" alt="#">
        </div>
    </section>

    <!-- jQuery Library (Make sure it's included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Validation Script -->
<script>
$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        // Clear previous errors
        $('.text-danger').text('');
        let email = $('#email').val();
        let password = $('#password').val();
     
        let isValid = true;

        // Validate email format
        if (!validateEmail(email)) {
            $('#email-error').text('Please enter a valid email address.');
            isValid = false;
        }

        // Validate password length
        if (password.length < 8) {
            $('#password-error').text('Password must be at least 8 characters long.');
            isValid = false;
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Email validation function using regex
    function validateEmail(email) {
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});

</script>
@endsection
