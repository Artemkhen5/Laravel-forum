<?php


namespace App\Services\Post;


use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function store($data)
    {
        $data['user_id'] = Auth::user()->id;

        $tags = $data['tags'] ?? null;
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);
    }

    public function update($post, $data)
    {

    }
}
