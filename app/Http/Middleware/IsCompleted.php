<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if ( Auth::user()->is_completed === 1 ) {
                return $next($request);
            }
            return redirect()->route('get.incomplete.profile')->with('error', 'Please complete your profile to access this page.');
        }        
        return redirect()->route('home');        
    }
}
