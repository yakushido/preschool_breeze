<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function payment(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->amount,
                'currency' => 'jpy'
            ));

            Purchase::create([
                'stock_id' => $request->stock_id,
                'user_id' => Auth::id()
            ]);

            return redirect()->route('user.complete');
            // return back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function complete()
    {
        return view('user.complete');
    }
}
