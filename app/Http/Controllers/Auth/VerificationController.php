<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\DB;
use App\Models\Preference;
use App\Models\Interest;
class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function getIncompleteProfile()
    {
        $preferences = Preference::all(); 
        $interests = Interest::all(); 
        return view('complete-profile', compact('preferences', 'interests'));
    }
    
    
    public function completeUserProfile(Request $request)
    {
        $user = Auth::user();
    
       
        $validated = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,gif|max:8192', 
            'bio' => 'required|string|max:500', 
            'challenge_preferences' => 'required|string|max:255', 
            'challenge_types' => 'required|string|max:255', 
            'social_links' => 'required|string|max:255', 
        ]);
       
        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
       
        DB::statement("
            UPDATE users 
            SET 
                avatar = COALESCE(:avatar, avatar),
                bio = :bio,
                challenge_preferences = :challenge_preferences,
                challenge_types = :challenge_types,
                social_links = :social_links,
                is_completed = :is_completed,
                updated_at = :updated_at
            WHERE id = :id
        ", [
            'avatar' => $validated['avatar'] ?? null,
            'bio' => $validated['bio'],
            'challenge_preferences' => $validated['challenge_preferences'],
            'challenge_types' => $validated['challenge_types'],
            'social_links' => $validated['social_links'],
            'is_completed' => true,
            'updated_at' => now(),
            'id' => $user->id,
        ]);
    
        return redirect(route('dashboard'))->with('success', 'Profile updated successfully!');


    }
}
