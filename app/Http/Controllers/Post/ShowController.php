<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        $comments = Comment::orderBy('created_at', 'asc')->where('post_id', $post->id)->get();
        return view('post.show', compact('post', 'comments'));
    }
}
