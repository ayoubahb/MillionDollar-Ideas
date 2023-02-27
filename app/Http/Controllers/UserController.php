<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    
    //Show Login Form
    public function login()
    {
        return view('welcome');
    }
    //Show Login Form
    public function register()
    {
        return view('register');
    }

    //authenticate user
    public function authenticate(Request $request)
    {

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are logged in');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    //Create New User
    public function store(Request $request)
    {
        // dd($request);
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
            'dob' => ['required'],
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        //create User
        $user = User::create($formFields);

        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged In');
    }
    //Logout User
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
