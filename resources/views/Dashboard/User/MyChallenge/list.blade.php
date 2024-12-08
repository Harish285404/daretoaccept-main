@extends('layouts.dashboard')


@section('content')
<div class="events-stream-listing">
    @if(isset($challenges) && !empty($challenges))
        @foreach($challenges as $event)
            <div class="events-stream-wrap">
                <figure>
                    <img src="{{ url('asset/image.png') }}" alt="">
                </figure>
                <div class="events-stream-content">
                    <h3>{{ $event->title }}</h3>
                    <p>{{ $event->description }}</p>
                    <div class="btns">
                        <a class="ac-btn-blue">Watch Live</a>
                        <a href="{{ route('challange.detail', ['id' => encrypt($event->id)]) }}" class="ac-btn-blue-border">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
       
                <p>Cruntllty You Don't have Any Challange.</p>
               
    @endif
</div>
@endsection