<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rent;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::with('posts.rentInfos')->find(Auth::id());

        $rentsForBorrower = Rent::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        $rentsForLender = [];
        if ($user && $user->posts) {
            // Iterate through each post of the user
            foreach ($user->posts as $post) {
                // Iterate through each item of the post
                foreach ($post->rentInfos as $item) {
                    // Add the item to the buysForLender array
                    $rentsForLender[] = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'address' => $item->address,
                        'transaction_id' => $item->transaction_id,
                        'status' => $item->status,
                        'post_id' => $item->post_id,
                        'user_id' => $item->user_id,
                        'amount' => $item->amount
                    ];
                }
            }
        }

        // return $user->roles;
        if($user->hasRole('borrower')){
            $rents = $rentsForBorrower;
        }else {
            $rents = $rentsForLender;
        }

        // return $rents;
        return view('pages.rent.index', compact('rents'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        $rent->update([
            'status' => 'Approved',
        ]);

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rent)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
