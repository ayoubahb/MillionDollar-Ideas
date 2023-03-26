<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //show all posts 
    public function index()
    {
        $categories = Category::all();

        $posts = Post::with('user', 'categories')->latest()->filter(request(['category', 'search']))->get();

        return view('index', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    //show one post
    public function show(Post $post)
    {
        $showPost = Post::with(['commentaires.likes.user', 'likes.user'])->findOrFail($post->id);

        $liked = Like::where('user_id', auth()->id())
            ->where('post_id', $post->id)
            ->exists();

        $comments = $post->commentaires;

        foreach ($comments as $comment) {
            $commentUserLiked = false;

            foreach ($comment->likes as $like) {
                if ($like->userId === auth()->id()) {
                    $commentUserLiked = true;
                    break;
                }
            }

            $comment->userLiked = $commentUserLiked;
        }

        return view('show', [
            'post' => $showPost,
            'liked' => $liked,
            'comments' => $comments,
        ]);
    }

    //show create form
    public function create()
    {
        return view('create', [
            'categories' => Category::all()
        ]);
    }

    //create post
    public function store(Request $request)
    {
        $formFields = $request->validate(([
            'description'  => 'required',
            'title' => 'required',
            'categories' => 'required|array',
        ]));

        $formFields['userId'] = auth()->id();

        if ($request->hasFile('image')) {
            $formFields['file'] = $request->file('image')->store('images', 'public');
        }
        $post = Post::create($formFields);

        $post->categories()->attach($formFields['categories']);

        return redirect('/')->with('message', 'Post added successfully');
    }
    //manage post
    public function manage()
    {
        return view('manage', ['posts' => auth()->user()->posts()->get()]);
    }

    //show edit form
    public function edit(Post $post)
    {
        return view('edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    //update post
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

    //delete post
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts/manage')->with('message', 'Post deleted seccessfully');
    }
}
