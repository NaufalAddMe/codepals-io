<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $postData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $postData['image'] = $imagePath;
        }

        Post::create($postData);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post->update([
            'content' => $request->content,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }
}
