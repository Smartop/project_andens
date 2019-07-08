<?php

namespace Andens\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

use Illuminate\Support\Facades\Auth;
use Andens\Models\User;

class SubscribeController extends Controller
{
    public function showSubscribe()
    {
        return view('subscribe');
    }

    public function subscription(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $token = $request->stripeToken;
        $user = Auth::user();
        $user->newSubscription('premium', 'plan_EKsKCiQxtoNtff')->create($token, [
            'email' => $user->email,
        ]);
    }
}
