<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post->delete();
        Comment::where('post_id', '=', $post->id)->delete();
        return redirect()->route('profile.posts');
    }
}
