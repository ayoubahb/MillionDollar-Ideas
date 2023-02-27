<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //show Posts 
    public function index()
    {
        $categories = Category::all();


        $posts = Post::with('user','categories')->latest()->filter(request(['category']))->get();
        return view('index', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }
    public function store(Request $request)
    {
        dd($request);
        $formFields = $request->validate(([
            'description'  => 'required',
            'categories' => 'required|array',
        ]));

        $post = new Post();
        $post->description = $formFields['description'];
        $post->userId = auth()->id();

        if ($request->hasFile('image')) {
            $post->file = $request->file('image')->store('images', 'public');
        }
        $post->save();

        $post->categories()->attach($formFields['categories']);

        return back()->with('message', 'Post added seccessfully');
    }
    //show edit form
    public function edit(Post $post)
    {
        return view('edit', ['post' => $post]);
    }

    // update
    public function update(Request $request, Post $post)
    {
        $formFields = $request->validate(([
            'description'  => 'required',
            'categoryId'   => 'required'
        ]));

        if ($request->hasFile('image')) {
            $formFields['file'] = $request->file('image')->store('images', 'public');
        }

        $formFields['userId'] = auth()->id();

        $post->update($formFields);
        return redirect('/')->with('message', 'Post updated seccessfully');
    }
    //delete
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/')->with('message', 'Post deleted seccessfully');
    }
}
