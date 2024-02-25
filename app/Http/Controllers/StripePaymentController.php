<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Post;
use Session;
use Stripe;


class StripePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function stripe(String $id)
    {
        return view('pages.stripe.index', compact('id'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function stripePost(Request $request, String $id)
    {
        $post = Post::where('id', $id)->first();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $transection = Stripe\Charge::create ([
                "amount" => intval($post->price),
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        if($transection->balance_transaction){
            Rent::create([
                'name' => auth()->user()->name,
                'address' => $request->address,
                'transaction_id' => $transection->balance_transaction,
                'status' => 'In-progress',
                'post_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        }


        Session::flash('success', 'Payment successful!');

        return back();
    }
}
