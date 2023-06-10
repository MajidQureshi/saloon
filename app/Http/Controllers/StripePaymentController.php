<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripepost(Request $request)
    {
        // dd($request);
        \Stripe\Stripe::setApiKey('sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV');
        // Stripe\Stripe::setApiKey("sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV");
    
        \Stripe\Charge::create ([
                "amount" => 10 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
        // Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
