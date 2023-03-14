<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function toggleLike(Post $post)
    {

        $existingLike = Like::where('user_id', auth()->id())
        ->where('post_id', $post->id)
        ->first();

        // If a matching record is found, return an error response
        if ($existingLike) {
            $existingLike->delete();
            return back();
        }
        $like = array('user_id'=> auth()->id(),'post_id'=> $post->id);
        $like  = Like::create($like);

        return back();
    }
}
