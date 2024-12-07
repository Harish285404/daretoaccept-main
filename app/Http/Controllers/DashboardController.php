<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $challenge = Challenge::get();

        return view('Dashboard.User.Index',compact('challenge'));
    }
    public function challenges()
    {
        return view('Dashboard.User.challenges');
    }

    public function leaderboard()
    {
        return view('Dashboard.User.leaderboard');
    }

    public function profile()
    {
        return view('Dashboard.User.profile');
    }

    public function socialFeedDetails()
    {
        return view('Dashboard.User.social-feed-details');
    }

    public function socialFeed()
    {
        return view('Dashboard.User.social-feed');
    }
    public function stream()
    {
        return view('Dashboard.User.stream');
    }
    public function viewChallenge()
    {
        return view('Dashboard.User.view-challenge');
    }
    // public function myChallenges()
    // {
    //     return view('Dashboard.User.MyChallenge.Create');
    // }
}
