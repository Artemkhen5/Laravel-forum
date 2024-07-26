<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('post.destroy');
});

Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('comment.store');

Route::group(['middleware' => 'profile'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/posts', [ProfileController::class, 'posts'])->name('profile.posts');
    Route::get('/profile/comments', [ProfileController::class, 'comments'])->name('profile.comments');
    Route::delete('/profile/comments/{comment}', [ProfileController::class, 'deleteComment'])->name('profile.comments.destroy');
});

Auth::routes();

