<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'challenge_date',
        'total_participants',
        'amount',
        'social_media_link',
        'description',
        'rules',
        'encouragement',
        'photo_path',
        'video_path',
        'user_id',
        'charity_id'
    ];
    protected $casts = [
        'challenge_date' => 'datetime',
    ];
}
