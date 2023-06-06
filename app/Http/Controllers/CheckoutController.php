<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV');
        		
		$amount = 150;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From Meetendo',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;
        // dd($intent);
		return view('checkout.credit-card',compact('intent'));

    }

    public function afterPayment()
    {
        return view('website.pages.newsuccessfullybooked');
        // echo 'Payment Has been Received';
    }
}
