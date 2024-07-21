<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DeleteController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', [HomeController::class, 'index']);

Route::group(['namespace' => 'Post'], function () {
    Route::get('/', [IndexController::class, '__invoke'])->name('post.index');
    Route::get('/posts/create', [CreateController::class, '__invoke'])->name('post.create');
    Route::post('/posts', [StoreController::class, '__invoke'])->name('post.store');
    Route::get('/posts/{post}', [ShowController::class, '__invoke'])->name('post.show');
    Route::delete('/posts/{post}', [DeleteController::class, '__invoke'])->name('post.destroy');
});

Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('comment.store');

Route::group(['middleware' => 'profile'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/posts', [ProfileController::class, 'posts'])->name('profile.posts');
    Route::get('/profile/comments', [ProfileController::class, 'comments'])->name('profile.comments');
    Route::delete('/profile/comments/{comment}', [ProfileController::class, 'deleteComment'])->name('profile.comments.destroy');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

