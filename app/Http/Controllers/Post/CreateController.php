<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $topics = Topic::all();
        return view('post.create', compact('topics'));
    }
}
