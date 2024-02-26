<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Post;
use Illuminate\support\Facades\DB;
use Session;
use Stripe;


class StripePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function stripeRent(String $id)
    {
        return view('pages.stripe.rent', compact('id'));
    }

    public function stripeBuy(Request $request)
    {
        $jsonData = $request->query('data');
        $post = json_decode($jsonData, true);

        return view('pages.stripe.buy', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function stripeRentPost(Request $request, String $id)
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

        return redirect()->route('rents.index');
    }

    public function stripeBuyPost(Request $request, String $id)
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
            DB::table('buys')->insert([
                'name' => auth()->user()->name,
                'address' => $request->address,
                'equipment_name' => $post->name,
                'equipment_quantity' => 1,
                'transaction_id' => $transection->balance_transaction,
                'status' => 'In-progress',
                'post_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        }

        Session::flash('success', 'Payment successful!');

        return redirect()->route('buys.index');
    }
}
