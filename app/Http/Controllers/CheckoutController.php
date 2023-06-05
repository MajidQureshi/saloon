<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51N0q2GGe3Ltd3BwxsfaTpZb0NEyrPqBq69oYO1IV3Ve26njJyDBX1AmeGFpJdFhe7J5sGlwhv6MCGt5640fFF3Xy00lKXTOfHr');
        		
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
