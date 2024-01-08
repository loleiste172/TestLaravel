<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $posts=[];
    if(auth()->check()){
        $posts=auth()->user()->usersPosts()->latest()->get();
    }
    
    //$posts=Post::where('user_id', auth()->id())->get();
    return view('home', ['posts'=>$posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'ShowEdit']);
Route::put('/edit-post/{post}', [PostController::class, 'EditPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'DeletePost']);

// Route::get(('/home'), function(){
//     return view('home');
// });