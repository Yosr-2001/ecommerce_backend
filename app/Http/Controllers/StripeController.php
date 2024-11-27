<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function processpayment(Request $request)
    {
        try {
            Stripe::setApiKey('sk_test_51QNENl06sTpeS7xDTeH3pmPP5BRlWTcfXk426BH9TUJGrwI9WtxTXOfyIsoXiK4JEq3YtGlSslO4B0Ihj87kj6Tt00PqcosysF');
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $request->line_items,
                'mode' => 'payment',
                'success_url' => $request->success_url,
                'cancel_url' => $request->cancel_url,
            ]);
            return response()->json(['id' => $session->id]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
