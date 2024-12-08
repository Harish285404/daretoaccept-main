@extends('layouts.dashboard')

@section('content')
<!-- In the <head> section -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- Before the closing </body> tag -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="dash-wrapper">   
  
        
        <div class="right-bottom-dash">
            <div class="right-dash-inner">
                <div class="title">
                    <h3>Challenges</h3>
                    <div class="search-field">
                        <input type="text" placeholder="Search for Challenge" >
                    </div>
                </div>
                <div class="info-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Upcoming Challenges</a></li>
                        <li><a data-toggle="tab" href="#menu1">Completed Challenges</a></li> 
                    </ul>
                    <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                            <div class="challlenges-list">
                                @foreach ($upcomingChallenges as $challenge)
                                    <div class="challange-wrapper">
                                    <figure>
                                        @if ($challenge->photo_path)
                                            <img src="{{ url('storage/challanges/images/' . $challenge->photo_path) }}" alt="{{ $challenge->title }}">
                                        @else
                                            <img src="{{ url('asset/image.png') }}" alt="Default Image">
                                        @endif
                                    </figure>
                                        <div class="challange-content">
                                            <h3>{{ $challenge->title }}</h3>
                                            <p>{{ $challenge->description }}</p>
                                            <div class="challange-btn">
                                                <div class="btn-wrap">
                                                    <a href="{{ $challenge->live_url }}" class="ac-btn-blue" target="_blank">Watch Live</a>
                                                    <a href="{{ route('challange.detail', ['id' => encrypt($challenge->id)]) }}" class="ac-btn-blue-border">View Details</a>
                                                </div>
                                                <div class="share-btns">
    <!-- Share Button -->
    <a class="share-btn" href="javascript:void(0)" onclick="toggleShareOptions()">
        <img src="{{ url('asset/share.png') }}" alt="Share">
    </a>

    <!-- Share Options (Initially Hidden) -->
    <div id="shareOptions" style="display: none; position: absolute; background-color: white; border: 1px solid #ddd; padding: 10px; z-index: 100;">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">Facebook</a></li>
            <li><a href="https://wa.me/?text={{ urlencode('Check this out: ' . url()->current()) }}" target="_blank">WhatsApp</a></li>
            <li><a href="https://www.instagram.com/" target="_blank">Instagram</a></li>
        </ul>
    </div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="menu1" class="tab-pane fade">
                        <div class="challlenges-list">
                                @foreach ($completedChallenges as $challenge)
                                    <div class="challange-wrapper">
                                    <figure>
                                        @if ($challenge->photo_path)
                                            <img src="{{ url('storage/challanges/images/' . $challenge->photo_path) }}" alt="{{ $challenge->title }}">
                                        @else
                                            <img src="{{ url('asset/image.png') }}" alt="Default Image">
                                        @endif
                                    </figure>
                                        <div class="challange-content">
                                            <h3>{{ $challenge->title }}</h3>
                                            <p>{{ $challenge->description }}</p>
                                            <div class="challange-btn">
                                                <div class="btn-wrap">
                                                    <a href="{{ $challenge->live_url }}" class="ac-btn-blue" target="_blank">Watch Live</a>
                                                    <a href="{{ route('challange.detail', ['id' => encrypt($challenge->id)]) }}" class="ac-btn-blue-border">View Details</a>
                                                </div>
                                                <div class="share-btns">
    <!-- Share Button -->
    <a class="share-btn" href="javascript:void(0)" onclick="toggleShareOptions()">
        <img src="{{ url('asset/share.png') }}" alt="Share">
    </a>

    <!-- Share Options (Initially Hidden) -->
    <div id="shareOptions" style="display: none; position: absolute; background-color: white; border: 1px solid #ddd; padding: 10px; z-index: 100;">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">Facebook</a></li>
            <li><a href="https://wa.me/?text={{ urlencode('Check this out: ' . url()->current()) }}" target="_blank">WhatsApp</a></li>
            <li><a href="https://www.instagram.com/" target="_blank">Instagram</a></li>
        </ul>
    </div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    
</div>

<script>
    function toggleShareOptions() {
        var shareOptions = document.getElementById("shareOptions");
        if (shareOptions.style.display === "none" || shareOptions.style.display === "") {
            shareOptions.style.display = "block";
        } else {
            shareOptions.style.display = "none";
        }
    }
</script>

    @endsection