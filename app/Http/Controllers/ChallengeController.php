<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Charity;
use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;
use Auth;
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


    public function showAll(){
        $challenges =Challenge::all();
        return view('Dashboard.User.MyChallenge.Index',compact('challenges'));
    }

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

                if ($request->hasFile('photo')) {
                    if ($challenge->photo) {
                        Storage::delete('public/' . $challenge->photo);
                    }
                    $image = $request->file('photo');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('challanges/images', $imageName, 'public');
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
                    'photo' => $imageName,
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
        $challenge = Challenge::findOrFail($id);
    
        if ($request->hasFile('photo')) {
        if ($challenge->photo) {
            Storage::delete('public/' . $challenge->photo);
        }
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('challanges/images', $imageName, 'public'); 
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
        'photo' => $imageName ?? $challenge->photo,  
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
