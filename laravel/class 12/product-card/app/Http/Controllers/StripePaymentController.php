<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StripePaymentController extends Controller
{

    public function stripe(): View
    {
        return view('stripe');
    }
      
    public function stripePost(Request $request): RedirectResponse
    {
        // 1. Fetch the cart from the session
        $cart = session('cart', []);
        $total = 0;

        // 2. Calculate the dynamic total
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // 3. Ensure the total is greater than 0 to prevent Stripe API errors
        if ($total <= 0) {
            return back()->with('error', 'Cart is empty or total is invalid.');
        }

        // 4. Process the payment with Stripe
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
        Stripe\Charge::create ([
                "amount" => $total * 100, // Multiplied by 100 because Stripe expects cents
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment from " . $request->name 
        ]);
        
        // 5. (Optional but recommended) Clear the cart after a successful payment
        // session()->forget('cart');
                
        return back()
                ->with('success', 'Payment successful!');
    }
}