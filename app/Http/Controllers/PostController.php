<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $formFields = $request->validate(([
            'description'  => 'required',
        ]));
        
        if ($request->hasFile('image')) {
            $formFields['file'] = $request->file('image')->store('images', 'public');
        }
        
        $formFields['userId'] = auth()->id();
        $formFields['categoryId'] = 1;
        // dd($formFields);



        Post::create($formFields);
        return back();
    }
}
