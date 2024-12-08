<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Charity;
use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;
use Auth;
use Carbon\Carbon;
class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = Challenge::where('user_id', auth()->id())->get();
        return view('Dashboard.User.MyChallenge.MyChallenges', compact('challenges'));
    }

    public function showAll() {
        
        $today = Carbon::now();
        $userId = Auth::id(); 
        $upcomingChallenges = Challenge::where('user_id', '!=', $userId)
                                        ->where('challenge_date', '>', $today)
                                        ->get();

        $completedChallenges = Challenge::where('user_id', '!=', $userId)
                                         ->where('challenge_date', '<=', $today)
                                         ->get();
    
        return view('Dashboard.User.MyChallenge.Index', compact('upcomingChallenges', 'completedChallenges'));
    }

        public function showList(){
            $challenges = Challenge::where('user_id', auth()->id())->get(); 
            return view('Dashboard.User.MyChallenge.list',compact('challenges'));

        }

        public function showDetail($id){
            if(Auth::user()){
                $challengeId = decrypt($id);
                $myDetail = Challenge::findOrFail($challengeId);
                // $myDetail = Challenge::where('id',$id)->get(); 
                return view('Dashboard.User.MyChallenge.view-detail',compact('myDetail'));
            }
            

        }

        // public function showShareDetail($id){
        //     $myDetail = Challenge::where('id',$id)->get(); 
        //     return view('Dashboard.User.MyChallenge.view-detail',compact('myDetail'));

        // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $charities = Charity::all();
        return view('Dashboard.User.MyChallenge.Create', compact('charities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChallengeRequest $request)
        {

            $validated = $request->validate([
                'title' => 'required|string|max:100',
                'start_date' => 'required|date',
                'start_time' => 'required|date_format:H:i',
                'total_participants' => 'required|integer|min:1',
                'amount' => 'required|numeric|min:0',
                'description' => 'required|string',
                'social_links' => 'required|url',
                'encouragement' => 'required|string',
                'rules' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', 
                'video' => 'nullable|mimes:mp4,mov|max:102400',
                ]);
                
                $imageName = null;
                $videoName = null;
                if ($request->hasFile('photo')) {

                    $image = $request->file('photo');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('challanges/images', $imageName, 'public');
                    
                }

                if ($request->hasFile('videos')) {
                    $video = $request->file('videos');
                    $videoName = time() . '.' . $video->getClientOriginalExtension();
                    $image->storeAs('challanges/images', $videoName, 'public');
                }

                
                Challenge::create([
                    'title' => $request->title,
                    'challenge_date' => $request->start_date . ', ' . $request->start_time,
                    'total_participants' => $request->total_participants,
                    'amount' => $request->amount,
                    'description' => $request->description,
                    'social_media_link' => $request->social_links,
                    'encouragement' => $request->encouragement,
                    'rules' => $request->rules,
                    'charity_id' => $request->charity_id,
                    'user_id' => Auth::user()->id,
                    'photo_path' => $imageName,
                    'video_path' => $videoName,
                ]);
                

            return redirect()->route('challenge.index')->with('success', 'Challenge created successfully!');
        }




        public function edit(Challenge $challenge)
        {
            $charities = Charity::all();
            return view('Dashboard.User.MyChallenge.Edit', compact('challenge','charities'));
        }
        

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChallengeRequest $request, Challenge $challenge, $id)
{
// dd($request->all());
    $validated = $request->validate([
        'title' => 'required|string|max:100',
        'start_date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'total_participants' => 'required|integer|min:1',
        'amount' => 'required|numeric|min:0',
        'description' => 'required|string',
        'social_links' => 'required',
        'encouragement' => 'required|string',
        'rules' => 'required|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', 
        'video' => 'nullable|mimes:mp4,mov|max:102400',
        ]);
        $challenge = Challenge::findOrFail($id);
    
        if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('challanges/images', $imageName, 'public'); 
       }


        if ($request->hasFile('videos')) {
            $video = $request->file('videos');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $image->storeAs('challanges/images', $videoName, 'public');
        }





    $challenge->update([
        'title' => $request->title,
        'challenge_date' => $request->start_date . ', ' . $request->start_time,
        'total_participants' => $request->total_participants,
        'amount' => $request->amount,
        'description' => $request->description,
        'social_media_link' => $request->social_links,
        'encouragement' => $request->encouragement,
        'rules' => $request->rules,
        'charity_id' => $request->charity_id ?? $challenge->charity_id, 
        'user_id' => Auth::user()->id, 
        'photo_path' => $imageName,
        'video_path' => $videoName,  
    ]);

    return redirect()->route('challenge.index')->with('success', 'Challenge updated successfully!');
}

    
    public function show(Challenge $challenges)
        {
            return redirect()->route('challenge.index')->with('success', 'Challenge updated successfully!');
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        //
    }
}
