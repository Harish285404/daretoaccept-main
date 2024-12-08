@extends('layouts.dashboard')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="dash-wrapper">
    <div class="right-dash">
        <div class="right-bottom-dash">
            <div class="right-dash-inner p-0">
                <a href="{{ route('challenge.create') }}" class="ac-btn-blue">Create New Challenge</a>

                @foreach ($challenges as $challenge)
                    <div class="challange-banner" style="background-image: url({{ $challenge->photo_path ? url('storage/challanges/images/' . $challenge->photo_path) : url('asset/image.png') }});">
                        <div class="challange-banner-img">
                        <figure> 
                        <img src="{{ $challenge->photo_path ? url('storage/challanges/images/' . $challenge->photo_path) : url('asset/image.png') }}" alt="Challenge Photo">
                    </figure>

                            <div class="challange-banner-text">
                                <h3>{{ $challenge->title }}</h3>
                                <h4>${{ number_format((float)$challenge->amount, 2) }}</h4>

                                <p>
                                    Start Date: {{ $challenge->challenge_date ? $challenge->challenge_date->format('Y-m-d') : 'N/A' }} | 
                                    Start Time: {{ $challenge->challenge_date ? $challenge->challenge_date->format('H:i') : 'N/A' }}
                                </p>

                            </div>
                        </div>
                        <a href="{{ route('challenge.edit', $challenge->id) }}" class="ac-btn-blue-border">
                            Edit Challenge
                        </a>
                    </div>

                    <div class="dash-content">
                    <div class="right-player-content">
                        <h3>Invite Players</h3>
                        <form>
                            <label>Invitation Link</label>
                            <input type="text" value="{{ route('challange.detail', ['id' => encrypt($challenge->id)]) }}" readonly id="inviteLink{{ $challenge->id }}">
                            <input type="button" value="Copy Link" onclick="copyLink({{ $challenge->id }})">
                        </form>
                    </div>

                        <h3>Challenge Description</h3>
                        <p>{{ $challenge->description }}</p>

                        <h3>Rules & Regulations</h3>
                        <p>{{ $challenge->rules }}</p>

                        <h3>Encouragement</h3>
                        <p>{{ $challenge->encouragement }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('lv_footer')
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Invitation link copied to clipboard!');
        }, function() {
            alert('Failed to copy the link. Please try again.');
        });
    }
</script>

<script>
    function copyLink(challengeId) {
        var copyText = document.getElementById('inviteLink' + challengeId);
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }
</script>
@endsection
