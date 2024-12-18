<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Nette\Utils\Random;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create([
                'name'           => $user->name,
                'email'          => $user->email,
                'password'       => Hash::make(Str::random(8)),
                'provider_name'  => $provider,
                'provider_id'    => $user->id,
                'provider_token' => $user->token,
            ]);
            Auth::login($newUser);
        }

        return redirect()->route('get.incomplete.profile');
    }

}
