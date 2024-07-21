<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = Post::all()->where('user_id', auth()->id());
        $comments = Comment::all()->where('user_id', auth()->id());

        return view('profile.index', compact('posts', 'comments'));
    }

    public function posts()
    {
        $posts = Post::all()->where('user_id', auth()->id());

        return view('profile.posts', compact('posts'));
    }

    public function comments()
    {
        $posts = Post::all()->where('user_id', auth()->id());
        $comments = Comment::all()->where('user_id', auth()->id());

        return view('profile.comments', compact('comments', 'posts'));
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('profile.comments');
    }
}
