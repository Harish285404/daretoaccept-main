@extends('layouts.dashboard')

@section('content')
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
                                @foreach ($challenges as $challenge)
                                    <div class="challange-wrapper">
                                        <figure>
                                            <!-- <img src="{{ url($challenge->image ?? 'asset/default-image.png') }}" alt="{{ $challenge->title }}"> -->
                                            @if($challenge->photo_path)
                                            <img  src="{{ Storage::url($challenge->photo_path) }}" alt="Current Avatar" >
                                            @else
                                            <img src="{{ url('asset/image.png') }}" alt="">
                                            @endif
                                        </figure>
                                        <div class="challange-content">
                                            <h3>{{ $challenge->title }}</h3>
                                            <p>{{ $challenge->description }}</p>
                                            <div class="challange-btn">
                                                <div class="btn-wrap">
                                                    <a href="{{ $challenge->live_url }}" class="ac-btn-blue" target="_blank">Watch Live</a>
                                                    <a class="ac-btn-blue-border">View Details</a>
                                                </div>
                                                <a class="share-btn">
                                                    <img src="{{ url('asset/share.png') }}" alt="Share">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="menu1" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Some content in menu 1.</p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>



    @endsection