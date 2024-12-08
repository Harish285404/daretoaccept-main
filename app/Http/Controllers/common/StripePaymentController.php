<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{

    
    public function stripe()
    {
        return view('stripe');
    }


    public function stripePost(Request $request): RedirectResponse
    {

          
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
        Stripe\Charge::create ([
                "amount" => 10 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment." 
        ]);
                
        return back()
                ->with('success', 'Payment successful!');
    }
}
