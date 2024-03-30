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
    public function stripeRent(string $id)
    {
        return view('pages.stripe.rent', compact('id'));
    }

    public function stripeBuy(Request $request)
    {
        $jsonData = $request->query('data');
        $post = json_decode($jsonData, true);

        $selectedOption = 'online';

        return view('pages.stripe.buy', compact(['post', 'selectedOption']));
    }


    /**
     * Update the specified resource in storage.
     */
    public function stripeRentPost(Request $request, string $id, $length = 6)
    {
        $post = Post::where('id', $id)->first();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        if ($request->stripeToken) {
            $transection = Stripe\Charge::create([
                "amount" => intval($post->rent),
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
            ]);
        }

        if ($request->stripeToken) {
            Rent::create([
                'name' => auth()->user()->name,
                'address' => $request->address,
                'amount' => $post->rent,
                'transaction_id' => $transection->balance_transaction,
                'status' => 'In-progress',
                'post_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        } else {
            // Generate random bytes
            $randomBytes = random_bytes($length);

            // Convert to a hexadecimal string
            $randomKey = bin2hex($randomBytes);

            Rent::create([
                'name' => auth()->user()->name,
                'address' => $request->address,
                'amount' => $post->rent,
                'transaction_id' => $randomKey,
                'status' => 'In-progress',
                'post_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        }

        Session::flash('success', 'Payment successful!');

        return redirect()->route('rents.index');
    }

    public function stripeBuyPost(Request $request, string $id, $length = 6)
    {
        $post = Post::where('id', $id)->first();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        if ($request->stripeToken) {
            $transection = Stripe\Charge::create([
                "amount" => intval($post->price),
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
            ]);
        }


        if ($request->stripeToken) {
            DB::table('buys')->insert([
                'name' => auth()->user()->name,
                'address' => $request->address,
                'equipment_name' => $post->name,
                'equipment_quantity' => 1,
                'amount' => $post->price,
                'transaction_id' => $transection->balance_transaction,
                'status' => 'In-progress',
                'post_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        } else {
            // Generate random bytes
            $randomBytes = random_bytes($length);

            // Convert to a hexadecimal string
            $randomKey = bin2hex($randomBytes);

            DB::table('buys')->insert([
                'name' => auth()->user()->name,
                'address' => $request->address,
                'equipment_name' => $post->name,
                'equipment_quantity' => 1,
                'amount' => $post->price,
                'transaction_id' => $randomKey,
                'status' => 'In-progress',
                'post_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        }

        Session::flash('success', 'Payment successful!');

        return redirect()->route('buys.index');
    }
}
