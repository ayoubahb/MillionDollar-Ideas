<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        // $commentaire=[
        //     'userId'=> auth()->id(),
        //     'postId'=>12,
        //     'text'=>'sdfghjkl',
        //     'like'=> 0,
        // ];

        // Commentaire::create($commentaire);
    }
    public function store(Request $request,Post $post)
    {
        // dd($post->id);
        $formFields = $request->validate(([
            'text' => 'required',
        ]));

        $formFields['userId'] = auth()->id();
        $formFields['postId'] = $post->id;
        $formFields['like'] = 0;


        Commentaire::create($formFields);
        return back();
    }

}
