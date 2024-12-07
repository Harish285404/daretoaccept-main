@extends('layouts.dashboard')

@section('content')
<div class="right-bottom-dash">
    <div class="dahboard-main" style="background-image: url({{ url('asset/image.png') }});">
        <div class="dashboard-landing">
            <h2>Business To Business 
                Challenge</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 
                has been the industry's standard dummy text ever since the 1500s, when an unknown 
                printer took a galley of type and scrambled it</p>
            <div class="btns">
                <a class="ac-btn-blue">Live Now</a>
                <a class="play-btn">
                    <img src="{{ url('asset/play.png') }}" alt="">
                    <span>PLAY VIDEO<span>Watch Stream</span></span>
                </a>
            </div>
        </div>
    </div>
    <div class="dahboard-info-col">
    <div class="events-stream">
        <div class="title d-flex justify-content-between align-items-center">
            <h3>Events</h3>
            <a>View All</a>
        </div>
        <div class="events-stream-listing">
    @if(isset($challenge) && !empty($challenge))
        @foreach($challenge as $event)
            <div class="events-stream-wrap">
                <figure>
                    <img src="{{ url('asset/image.png') }}" alt="">
                </figure>
                <div class="events-stream-content">
                    <h3>{{ $event->title }}</h3>
                    <p>{{ $event->description }}</p>
                    <div class="btns">
                        <a class="ac-btn-blue">Watch Live</a>
                        <a class="ac-btn-blue-border">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="events-stream-wrap">
            <figure>
                <img src="{{ url('asset/image.png') }}" alt="">
            </figure>
            <div class="events-stream-content">
                <h3>Business 2 Business Challenge</h3>
                <p>Allows companies to set up challenges against one another or collaborate on specific challenges</p>
                <div class="btns">
                    <a class="ac-btn-blue">Watch Live</a>
                    <a class="ac-btn-blue-border">View Details</a>
                </div>
            </div>
        </div>
    @endif
</div>

    </div>
    <div class="events-stream">
        <div class="title d-flex justify-content-between align-items-center">
            <h3>Streams That you can Watch</h3>
            <a>View All</a>
        </div>
        <div class="events-stream-listing">
            <div class="events-stream-wrap">
                <figure>
                    <img src="{{ url('asset/image.png') }}" alt="">
                </figure>
                <div class="events-stream-content">
                    <h3>Business 2 Business Challenge</h3>
                    <p>Allows companies to set up challenges against one another or collaborate on specific challenges</p>
                    <div class="btns">
                        <a class="ac-btn-blue">Watch Live</a>
                        <a class="ac-btn-blue-border">View Details</a>
                    </div>
                </div>
            </div>
            <div class="events-stream-wrap">
                <figure>
                    <img src="{{ url('asset/image.png') }}" alt="">
                </figure>
                <div class="events-stream-content">
                    <h3>Business 2 Business Challenge</h3>
                    <p>Allows companies to set up challenges against one another or collaborate on specific challenges</p>
                    <div class="btns">
                        <a class="ac-btn-blue">Watch Live</a>
                        <a class="ac-btn-blue-border">View Details</a>
                    </div>
                </div>
            </div>
            <div class="events-stream-wrap">
                <figure>
                    <img src="{{ url('asset/image.png') }}" alt="">
                </figure>
                <div class="events-stream-content">
                    <h3>Business 2 Business Challenge</h3>
                    <p>Allows companies to set up challenges against one another or collaborate on specific challenges</p>
                    <div class="btns">
                        <a class="ac-btn-blue">Watch Live</a>
                        <a class="ac-btn-blue-border">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="top-ranking">
        <div class="title d-flex align-items-center justify-content-between">
            <h3>Top Rankings</h3>
            <a>View All</a>
        </div>
        <div class="ranking-table">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <div class="ranking-profile">
                                <img src="{{ url('asset/image.png') }}" alt="">
                                <p>Roger Philips</p>
                            </div>
                        </td>
                        <td>
                            <div class="ranking-points">
                                <p>4321 Points<span>+3.02</span></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ranking-profile">
                                <img src="{{ url('asset/image.png') }}" alt="">
                                <p>Roger Philips</p>
                            </div>
                        </td>
                        <td>
                            <div class="ranking-points">
                                <p>4321 Points<span>+3.02</span></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ranking-profile">
                                <img src="{{ url('asset/image.png') }}" alt="">
                                <p>Roger Philips</p>
                            </div>
                        </td>
                        <td>
                            <div class="ranking-points">
                                <p>4321 Points<span>+3.02</span></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ranking-profile">
                                <img src="{{ url('asset/image.png') }}" alt="">
                                <p>Roger Philips</p>
                            </div>
                        </td>
                        <td>
                            <div class="ranking-points">
                                <p>4321 Points<span>+3.02</span></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ranking-profile">
                                <img src="{{ url('asset/image.png') }}" alt="">
                                <p>Roger Philips</p>
                            </div>
                        </td>
                        <td>
                            <div class="ranking-points">
                                <p>4321 Points<span>+3.02</span></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ranking-profile">
                                <img src="{{ url('asset/image.png') }}" alt="">
                                <p>Roger Philips</p>
                            </div>
                        </td>
                        <td>
                            <div class="ranking-points">
                                <p>4321 Points<span>+3.02</span></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ranking-profile">
                                <img src="{{ url('asset/image.png') }}" alt="">
                                <p>Roger Philips</p>
                            </div>
                        </td>
                        <td>
                            <div class="ranking-points">
                                <p>4321 Points<span>+3.02</span></p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    </div>
</div>

@endsection