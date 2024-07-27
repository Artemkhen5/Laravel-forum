<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use App\Services\Post\Service;
use Illuminate\Contracts\Container\BindingResolutionException;

class PostController extends Controller
{
    public $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * @throws BindingResolutionException
     */
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->orderBy('created_at', 'desc')->paginate(3);
        $user = User::class;
        $comments = Comment::all();

        return view('post.index', compact('posts', 'user', 'comments'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('post.create', compact('tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        $comments = Comment::orderBy('created_at', 'asc')->where('post_id', $post->id)->get();
        return view('post.show', compact('post', 'comments'));
    }

    public function delete(Post $post)
    {
        $post->delete();
        Comment::where('post_id', '=', $post->id)->delete();
        return redirect()->route('profile.posts');
    }
}
