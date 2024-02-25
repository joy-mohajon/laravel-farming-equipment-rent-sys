<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = post::where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(10);

        return view('pages.post.index', compact('posts'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $nameWithoutSpaces = str_replace(' ', '_', $request->name);
        $fileName = $nameWithoutSpaces. '_'. time() . '.' . $request->imageUrl->getClientOriginalExtension();

        if ($request->hasFile('imageUrl')) {
            $filePath = $request->file('imageUrl')->storeAs('equipment_images',$fileName,'public');
            // $filePath = Storage::putFileAs('public', $request->file('profile_image'), $fileName);
            // $request->profile_image->move(public_path('profile_images'), $fileName);

            if ($request->imageUrl) {
                Storage::disk('public')->delete($fileName);
            }

            $imagePath = Storage::url($filePath);
            Post::create([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'imageUrl' => $imagePath,
                'user_id' => auth()->id(),
            ]);
        }
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully');
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
    public function edit(Post $post)
    {
        $post = Post::where('id', $post->id)->first();
        // return $post;
        return  view('pages.post.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::where('id', $post->id)->first();

        if ($request->hasFile('imageUrl')) {
            $nameWithoutSpaces = str_replace(' ', '_', $request->name);
            $fileName = $nameWithoutSpaces. '_'. time() . '.' . $request->imageUrl->getClientOriginalExtension();

            $filePath = $request->file('imageUrl')->storeAs('equipment_images',$fileName,'public');
            // $filePath = Storage::putFileAs('public', $request->file('profile_image'), $fileName);
            // $request->profile_image->move(public_path('profile_images'), $fileName);

            if ($request->imageUrl) {
                Storage::disk('public')->delete($fileName);
            }
            $imagePath = Storage::url($filePath);
            $post->update([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'imageUrl' => $imagePath,
            ]);
            return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
        }

        $post->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        // session()->flash('success', 'Rule Successfully Deleted');
        return response()->flash('success', 'Post has been deleted.');
    }
}
