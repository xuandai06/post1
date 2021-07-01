<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

Route::get('/post', function () {
    return view('posts.index');
});

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('/users/{user:username}/posts', [UserPostController::class,'index'])->name('user.posts');

Route::get('/register', [RegisterController::class,'index'])->name('register');

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'store']);

Route::post('/register', [RegisterController::class,'store']);

Route::get('/logout', [LogoutController::class,'logout'])->name('logout');

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::get('/register', [RegisterController::class,'index'])->name('register');

Route::get('/posts', [PostController::class,'index'])->name('posts');
Route::post('/posts', [PostController::class,'store']);
Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class,'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class,'destroy'])->name('posts.likes');




