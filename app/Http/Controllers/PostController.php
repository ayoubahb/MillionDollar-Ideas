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

        $posts = Post::with('user', 'categories', 'commentaires')->latest()->filter(request(['category']))->get();
        return view('index', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }
    public function store(Request $request)
    {
        // dd($request);
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
        $arr = [];
        for ($i = 0; $i < count($post->categories); $i++) {
            array_push($arr, $post->categories[$i]->name);
        }

        return view('edit', [
            'post' => $post,
            'postctg' => $arr,
            'categories' => Category::all(),
        ]);
    }

    // update
    public function update(Request $request, Post $post)
    {
        $formFields = $request->validate([
            'description' => 'required',
            'categories' => 'required|array',
        ]);

        $post->description = $formFields['description'];
        $post->categories()->sync($formFields['categories']);

        if ($request->hasFile('image')) {
            $post->file = $request->file('image')->store('images', 'public');
        }
        $post->save();

        return redirect('/')->with('message', 'Post updated successfully');
    }
    //delete
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/')->with('message', 'Post deleted seccessfully');
    }
}
