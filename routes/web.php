<?php
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $posts = Post::all();
    // $posts = Post::where('user_id', auth()->id())->get();
    if (auth()->check()) {
        $user = User::find(auth()->id());
        $posts = $user->usersCoolPosts()->latest()->get();
    }

    // if(auth()->check()){
    //     $user = auth()->user();
    //     $posts = $user->usersCoolPosts()->latest()->get();
    //     // $posts = auth()->user()->usersCoolPoss()-
    //     // posts()->latest()->get();t
    // }

    // return view('welcome');
    return view('home', ['posts' => $posts]);
});

Route::post('/register',[UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Blog Post related routes

Route::post('/create-post',[PostController::class, 'createPost']);
Route::get('/edit-post/{post}',[PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}',[PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}',[PostController::class, 'deletePost']);
