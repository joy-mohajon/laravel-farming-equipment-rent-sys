<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.auth.profile');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        request()->validate([
            'name' => 'required|string|max:255',
            'password' => 'confirmed',
            // 'password_confirmation' => ''
        ]);

        if($request->password){
            $user->update([
                'name' => request('name'),
                'email'=> $user->email,
                'password' => hash::make($request['password'])
            ]);
        }else{
            $user->update([
                'name' => request('name'),
                'email'=> $user->email,
            ]);
        }

        return Redirect()->route('get.profile')->with('success', 'Profile updated successfully!');
    }


    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        $user = auth()->user();

        $nameWithoutSpaces = str_replace(' ', '_', $user->name);
        $fileName = $nameWithoutSpaces . '.' . $request->profile_image->getClientOriginalExtension();

        if ($request->hasFile('profile_image')) {
            $filePath = $request->file('profile_image')->storeAs('images',$fileName,'public');
            // $filePath = Storage::putFileAs('public', $request->file('profile_image'), $fileName);
            // $request->profile_image->move(public_path('profile_images'), $fileName);

            if ($user->profile_image) {
                Storage::disk('public')->delete($fileName);
            }

            $imagePath = Storage::url($filePath);
            $user->update(['profile_image' => $imagePath]);
        }

        return back()->with('success', 'Profile image updated successfully.');
    }

}
