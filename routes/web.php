<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[UserController::class, 'index'])->middleware('auth');
//Shoe login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
//Shoe register form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');;
//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
//Create New User
Route::post('/users', [UserController::class, 'store']);
//logout User
Route::post('/logout', [Usercontroller::class, 'logout'])->middleware('auth');

//------------------------------------------------------------------------------------------------

Route::post('/posts', [PostController::class, 'store'])->middleware('auth');