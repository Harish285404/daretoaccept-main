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
                <form class="change-password" method="POST" action="{{ route('challenge.update', $challenge->id) }}" enctype="multipart/form-data">
                    
                @csrf
                
                    <div class="form-field w-100">
                        <label>Challenge Title</label>
                        <input type="text" name="title" value="{{ old('title', $challenge->title) }}"  required>
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-field">
                        <label>Start Date</label>
                        <input type="date" name="start_date" value="{{ old('start_date', $challenge->challenge_date ? $challenge->challenge_date->format('Y-m-d') : '') }}" required>
                        @error('start_date')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-field">
                        <label>Start Time</label>
                        <input type="time" name="start_time" value="{{ old('start_time', $challenge->challenge_date ? $challenge->challenge_date->format('H:i') : '') }}" required>
                        @error('start_time')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-field">
                        <label>Total Participants</label>
                        <input type="number" name="total_participants" value="{{ old('total_participants', $challenge->total_participants) }}">
                        @error('total_participants')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-field">
                        <label>Amount</label>
                        <input type="text" name="amount" placeholder="Enter Amount"  value="{{ old('amount', $challenge->amount) }}" >
                        @error('amount')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-field">
                        <label>Charity Select</label>
                        <select name="charity_id">
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
                    </div>


                    <div class="form-field">
                        <label>Social Links</label>
                        <input type="url" name="social_links" placeholder="Enter Social Links">
                        @error('social_links')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-field w-100">
                        <label>Description</label>
                        <textarea name="description" placeholder="Enter Description">{{ old('description', $challenge->description) }}</textarea>
                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-field w-100">
                        <label>Rules & Regulations</label>
                        <textarea name="rules" placeholder="Enter Rules & Regulations">{{ old('rules', $challenge->rules) }}</textarea>
                        @error('rules')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-field w-100">
                        <label>Encouragement For User</label>
                        <textarea name="encouragement" placeholder="Enter Encouragement">{{ old('encouragement', $challenge->encouragement) }}</textarea>
                        @error('encouragement')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-field w-100">
                        <label>Upload Photo</label>
                        <div class="drop-zone">
                            <img src="{{ url('asset/upload.png') }}" alt="">
                            <span class="drop-zone__prompt">
                                Choose a file or drag & drop it here
                                <span>PNG, JPG formats, up to 10MB</span>
                            </span>
                            <span class="btn">Upload Files</span>
                            <input type="file" id="myFile" class="drop-zone__input">

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
                        <div class="drop-zone">
                            <img src="{{ url('asset/upload.png') }}" alt="">
                            <span class="drop-zone__prompt">
                                Choose a file or drag & drop it here
                                <span>MP4, MOV formats, up to 100MB</span>
                            </span>
                            <span class="btn">Upload Files</span>
                            <input type="file" name="video" class="drop-zone__input">
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
<script>


document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");

    dropZoneElement.addEventListener("click", (e) => {
        inputElement.click();
    });

    inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
    });

    dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, (e) => {
            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

    dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();

        if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }

        dropZoneElement.classList.remove("drop-zone--over");
    });
});


function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }

    if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;

    if (file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
    } else {
        thumbnailElement.style.backgroundImage = null;
    }
}

  </script>

