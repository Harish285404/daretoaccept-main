@extends('layouts.dashboard')

@section('content')

<style>
    .error{
        color:red;
    }
    </style>
<div class="dash-wrapper">
    <div class="right-bottom-dash">
        <div class="right-dash-inner">
            <div class="form-wrapper">
                <h3>Edit Challenge</h3>
                <form class="change-password" method="POST" action="{{ route('challenge.update', $challenge->id) }}" enctype="multipart/form-data" id="createchalange">
                    
                @csrf
                
                    <div class="form-field w-100">
                        <label>Challenge Title</label>
                        <input type="text" name="title" value="{{ old('title', $challenge->title) }}"  id="name">
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div id="name-error" class="text-danger"></div>
                    </div>

                    <div class="form-field">
                        <label>Start Date</label>
                        <input type="date" name="start_date" value="{{ old('start_date', $challenge->challenge_date ? $challenge->challenge_date->format('Y-m-d') : '') }}" id="startdate">
                        @error('start_date')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div id="startdate-error" class="text-danger"></div>
                    </div>

                    <div class="form-field">
                        <label>Start Time</label>
                        <input type="time"  id="starttime" name="start_time" value="{{ old('start_time', $challenge->challenge_date ? $challenge->challenge_date->format('H:i') : '') }}" >
                        @error('start_time')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div id="starttime-error" class="text-danger"></div>
                    </div>


                    <div class="form-field">
                        <label>Total Participants</label>
                        <input type="number" id="participant" name="total_participants" value="{{ old('total_participants', $challenge->total_participants) }}">
                        @error('total_participants')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div id="participant-error" class="text-danger"></div>
                        </div>
                    <div class="form-field">
                        <label>Amount</label>
                        <input type="text" id="amount" name="amount" placeholder="Enter Amount"  value="{{ old('amount', $challenge->amount) }}" >
                        @error('amount')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div id="amount-error" class="text-danger"></div>
                        </div>

                    <div class="form-field">
                        <label>Charity Select</label>
                        <select name="charity_id" id="charity">
                            <option value="">Select</option>
                            @foreach ($charities as $charity)
                                <option value="{{ $charity->id }}" {{ old('charity_id', $challenge->charity_id) == $charity->id ? 'selected' : '' }}>
                                    {{ $charity->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('charity_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div id="charity-error" class="text-danger"></div>
                        </div>


                    <div class="form-field">
                        <label>Social Links</label>
                        <input type="url" name="social_links" placeholder="Enter Social Links" id="social" value="{{ old('social_media_link', $challenge->social_media_link) }}" >
                        @error('social_links')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div id="social-errors" class="text-danger"></div>
                        </div>

                    <div class="form-field w-100">
                        <label>Description</label>
                        <textarea name="description" placeholder="Enter Description" id="description">{{ old('description', $challenge->description) }}</textarea>
                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div id="description-error" class="text-danger"></div>
                        </div>

                    <div class="form-field w-100">
                        <label>Rules & Regulations</label>
                        <textarea name="rules" placeholder="Enter Rules & Regulations" id="rule">{{ old('rules', $challenge->rules) }}</textarea>
                        @error('rules')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div id="rule-error" class="text-danger"></div>
                        </div>

                    <div class="form-field w-100">
                        <label>Encouragement For User</label>
                        <textarea name="encouragement" placeholder="Enter Encouragement" id="encourage">{{ old('encouragement', $challenge->encouragement) }}</textarea>
                        @error('encouragement')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div id="encourage-error" class="text-danger"></div>
              
                    </div>

                    <div class="form-field w-100">
                        <label>Upload Photo</label>
                        <div class="drop-zone" id="photoDropZone">
                            <img src="{{ url('asset/upload.png') }}" alt="">
                            <span class="drop-zone__prompt">
                                Choose a file or drag & drop it here
                                <span>PNG, JPG formats, up to 10MB</span>
                            </span>
                            <span class="btn" id="photoUploadBtn">Upload Files</span>
                            <input type="file" name="photo" class="drop-zone__input" id="photo">

                        </div>
                        @error('photo')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        @if($challenge->photo)
                            <img src="{{ url('storage/' . $challenge->photo) }}" alt="Current Challenge Photo" width="100">
                        @endif
                    </div>

                    <div class="form-field w-100">
                        <label>Upload Video</label>
                        <div class="drop-zone" id="videoDropZone">
                            <img src="{{ url('asset/upload.png') }}" alt="">
                            <span class="drop-zone__prompt">
                                Choose a file or drag & drop it here
                                <span>MP4, MOV formats, up to 100MB</span>
                            </span>
                            <span class="btn" id="videoUploadBtn">Upload Files</span>
                            <input type="file" name="videos" class="drop-zone__input" id="videos">
                        </div>
                        @error('video')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-btn w-100">
                        <input type="submit" value="Update Challenge" class="ac-btn-blue">
                        <a href="{{ route('challenge.index') }}" class="ac-btn-blue invert-btn">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
@section('lv_footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
   
    $('#photoUploadBtn').on('click', function() {
        $('#photo').click();
    });

    $('#videoUploadBtn').on('click', function() {
        $('#videos').click();
    });


});
</script>


<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Handle form submission
        $('#createchalange').submit(function(e) {
            e.preventDefault();  // Prevent form from submitting until validation is passed

            // Clear previous error messages
            $('.error').text('');
            $('.form-field input, .form-field select, .form-field textarea').removeClass('is-invalid');

            let isValid = true;

            // Validate Challenge Title
            const title = $('#name').val();
            if (title.trim() === '') {
                $('#name-error').text('Challenge Title is required');
                $('#name').addClass('is-invalid');
                isValid = false;
            }

            // Validate Start Date
            const startDate = $('#startdate').val();
            if (startDate === '') {
                $('#startdate-error').text('Start Date is required');
                $('#startdate').addClass('is-invalid');
                isValid = false;
            }

            // Validate Start Time
            const startTime = $('#starttime').val();
            if (startTime === '') {
                $('#starttime-error').text('Start Time is required');
                $('#starttime').addClass('is-invalid');
                isValid = false;
            }

            // Validate Total Participants (ensure it's a positive number)
            const totalParticipants = $('#participant').val();
            if (totalParticipants <= 0) {
                $('#participant-error').text('Please enter a valid number of participants');
                $('#participant').addClass('is-invalid');
                isValid = false;
            }

            // Validate Amount (ensure it's a number and greater than 0)
            const amount = $('#amount').val();
            if (amount.trim() === '' || isNaN(amount) || parseFloat(amount) <= 0) {
                $('#amount-error').text('Please enter a valid amount');
                $('#amount').addClass('is-invalid');
                isValid = false;
            }

            // Validate Charity Select (ensure a value is selected)
            const charity = $('#charity').val();
            if (charity === '') {
                $('#charity-error').text('Please select a charity');
                $('#charity').addClass('is-invalid');
                isValid = false;
            }

       
        //  // Validate Social Links (ensure it's a valid URL)
        //     const socialLinks = $('#socials').val();
        //     if (socialLinks && !/^https?:\/\/[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*(?::\d+)?(?:\/[^\s]*)?$/.test(socialLinks)) {
        //         $('#sociasl-error').text('Please enter a valid URL (e.g., http://example.com)');
        //         $('#socials').addClass('is-invalid');
        //         isValid = false;
        //     }

   
            // Validate Social Links (ensure it's a valid URL)
            const socialLinks = $('#social').val().trim();

            // Check if social link is not empty
            if (socialLinks === '') {
                $('#social-errors').text('Social link is required');
                $('#social').addClass('is-invalid');
                isValid = false;
            } else {
                // Pattern for validating URL (http:// or https://)
                const urlPattern = /^(https?:\/\/)?([a-z0-9-]+\.)+[a-z0-9]{2,6}(\/[^\s]*)?$/;

                if (!urlPattern.test(socialLinks)) {
                    $('#social-errors').text('Please enter a valid social link (e.g., http://example.com)');
                    $('#social').addClass('is-invalid');
                    isValid = false;
                }
            }

            // Validate Description
            const description = $('#description').val();
            if (description.trim() === '') {
                $('#description-error').text('Description is required');
                $('#description').addClass('is-invalid');
                isValid = false;
            }

            // Validate Rules & Regulations
            const rules = $('#rule').val();
            if (rules.trim() === '') {
                $('#rule-error').text('Rules & Regulations are required');
                $('#rule').addClass('is-invalid');
                isValid = false;
            }

            // Validate Encouragement
            const encouragement = $('#encourage').val();
            if (encouragement.trim() === '') {
                $('#encourage-error').text('Encouragement is required');
                $('#encourage').addClass('is-invalid');
                isValid = false;
            }

            // If all fields are valid, submit the form
            if (isValid) {
                this.submit();  // Submit the form
            }
        });
    });
</script>

