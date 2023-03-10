<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //show Posts 
    public function index()
    {
        $categories = Category::all();

        $posts = Post::with('user', 'categories', 'commentaires', 'likes.post')->latest()->filter(request(['category']))->get();
        // dd($posts);
        return view('index', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }
    //show listing
    public function show(Post $post)
    {

        $liked = DB::table('likes')
            ->where('user_id', auth()->id())
            ->where('post_id', $post->id)
            ->exists();
        // dd($liked);
        return view('show', [
            'post' => $post,
            'liked' => $liked
        ]);
    }
    //show listing
    public function create()
    {
        return view('create', [
            'categories' => Category::all()
        ]);
    }
    //show listing
    public function manage()
    {
        return view('manage', ['posts' => auth()->user()->posts()->get()]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $formFields = $request->validate(([
            'description'  => 'required',
            'title' => 'required',
            'categories' => 'required|array',
        ]));

        $post = new Post();
        $post->description = $formFields['description'];
        $post->title = $formFields['title'];
        $post->userId = auth()->id();

        if ($request->hasFile('image')) {
            $post->file = $request->file('image')->store('images', 'public');
        }
        $post->save();

        $post->categories()->attach($formFields['categories']);

        return redirect('/')->with('message', 'Post added seccessfully');
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
            'title' => 'required',
        ]);

        $post->description = $formFields['description'];
        $post->title = $formFields['title'];
        $post->categories()->sync($formFields['categories']);

        if ($request->hasFile('image')) {
            $post->file = $request->file('image')->store('images', 'public');
        }
        $post->save();

        return redirect('/posts/manage')->with('message', 'Post updated successfully');
    }
    //delete
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts/manage')->with('message', 'Post deleted seccessfully');
    }
}
