<?php


namespace App\Services\Comment;


use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function store($data)
    {
        $data['user_id'] = Auth::user()->id;

        $comment = Comment::create($data);
    }
}
