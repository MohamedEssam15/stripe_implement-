<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe(){
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => 25 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from Mohamed Essam"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
