<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\CommentLike;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    //
    public function toggleLike(Commentaire $comment)
    {

        $existingLike = CommentLike::where('userId', auth()->id())
        ->where('commentId', $comment->id)
        ->first();

        // If a matching record is found, return an error response
        if ($existingLike) {
            $existingLike->delete();
            return back();
        }
        $like = array('userId' => auth()->id(), 'commentId' => $comment->id);
        $like  = CommentLike::create($like);

        return back();
    }
}
