@extends('layouts.app')

@section('content')
<div class="dash-wrapper profile-setup" style="background-image: url({{ url('asset/image.png')}});"> 
        <div class="right-dash"> 
            <div class="right-bottom-dash">
                <div class="right-dash-inner">
                    <div class="company-logo">
                        <img src="{{ url('asset/logo.png') }}" alt="">
                    </div>
                    <div class="heading d-flex justify-content-between align-items-center">
                        <h3>Let’s setup your Profile</h3> 
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                            since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                            dummy text ever since the 1500s.</p>
                    </div> 
                    <div class="form-wrapper"> 
                    <form class="change-password" method="POST" action="{{ route('complete.profile') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-field w-100">
                            <label>Avatar Upload</label>
                            <div class="file-upload">
                                <input type="file" id="ac-file-upload" name="avatar" hidden>
                                <label class="ac-btn-blue-border" for="ac-file-upload">Upload Image</label>
                                <span class="info">.png, .jpeg, .gif files up to 8 MB. Recommended size is 256x256 px</span>
                                @error('avatar')
                                    <div class="error-message invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if(Auth::user()->avatar)
                                <img id="current-avatar"  src="{{ Storage::url(Auth::user()->avatar) }}" alt="Current Avatar" class="current-avatar" style="max-width: 100px; margin-top: 10px;">
                            @endif
                        </div>
                        <!-- Popup Modal -->
                        <div id="image-preview-popup" style="display: none;">
                            <div class="popup-overlay"></div>
                            <div class="popup-content">
                                <button id="close-popup" class="close-icon">&times;</button>
                                <img id="popup-avatar" src="" alt="Avatar Preview">
                            </div>
                        </div>
                        <!-- Bio -->
                        <div class="form-field w-100">
                            <label>Bio</label>
                            <textarea name="bio" placeholder="Enter Bio">{{ old('bio', Auth::user()->bio) }}</textarea>
                            @error('bio')
                                <div class="error-message invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div class="form-field w-100">
                        <label>Challenge Preferences</label>
                        <select name="challenge_preferences">
                            <option value="">Select</option>
                            @foreach ($preferences as $preference)
                                <option value="{{ $preference->id }}" {{ old('challenge_preferences', Auth::user()->challenge_preferences) == $preference->id ? 'selected' : '' }}>
                                    {{ $preference->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('challenge_preferences')
                            <div class="error-message invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-field w-100">
                        <label>Challenge Types of Interest</label>
                        <select name="challenge_types">
                            <option value="">Select</option>
                            @foreach ($interests as $interest)
                                <option value="{{ $interest->id }}" {{ old('challenge_types', Auth::user()->challenge_types) == $interest->id ? 'selected' : '' }}>
                                    {{ $interest->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('challenge_types')
                            <div class="error-message invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                        <div class="form-field w-100">
                            <label>Add Social Media Links</label>
                            <input type="text" name="social_links" placeholder="Enter Social Media Links" value="{{ old('social_links', Auth::user()->social_links) }}">
                            @error('social_links')
                                <div class="error-message  invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="form-btn w-100">
                            <input type="submit" value="Setup Your Profile" class="ac-btn-blue">
                        </div>
                    </form>

                    </div>


               
                     

            </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#current-avatar').on('click', function () {
        const avatarSrc = $(this).attr('src');
        $('#popup-avatar').attr('src', avatarSrc);
        $('#image-preview-popup').fadeIn();
    });

    $('#close-popup, .popup-overlay').on('click', function () {
        $('#image-preview-popup').fadeOut();
    });
});

</script>