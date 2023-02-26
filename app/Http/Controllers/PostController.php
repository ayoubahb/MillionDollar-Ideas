<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate(([
            'description'  => 'required',
            'categoryId'   => 'required'
        ]));
        
        if ($request->hasFile('image')) {
            $formFields['file'] = $request->file('image')->store('images', 'public');
        }
        
        $formFields['userId'] = auth()->id();
        // dd($formFields);



        Post::create($formFields);
        return back();
    }
}
