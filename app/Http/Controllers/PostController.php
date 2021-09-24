<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }

    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $post->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->route('posts.index');


    }


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $post->update([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $post->media()->delete();
            $post->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->back();

    }


    public function destroy(Post $post)
    {
        $post->media()->delete();
        $post->delete();
        return redirect()->back();
    }
}
