<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Buy;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buys = DB::table('buys')->where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(10);

        return view('pages.buy.index', compact('buys'))
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
    public function edit(String $id)
    {
        $buy = Buy::where('id', $id)->first();

        if($buy->status != 'Received'){
            $post = Post::where('id', $buy->post_id)->first();
            $post->update([
                'quantity' => $post->quantity - 1,
            ]);
        }
        $buy->update(['status' => 'Received']);

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
