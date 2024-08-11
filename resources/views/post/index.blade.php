@extends('layouts.app')
@section('content')
    <div class="mb-3">
        @foreach($tags as $tag)
            <a class="me-3 text-decoration-none" href="{{ route('post.index', ['tag_id' => $tag->id]) }}">
                {{ $tag->title }}
            </a>
        @endforeach
    </div>
    @if(\Illuminate\Support\Facades\Auth::user())
        <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">
            New post
        </a>
    @endif
    @foreach($posts as $post)
        <div class="container py-3 border-bottom">
            <a href="{{ route('post.show', $post->post_id ?? $post->id)}}" class="text-decoration-none text-dark">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <div>
                    <div class="d-flex align-items-center">
                        <span class="me-3"><b>Author: </b> {{ $user::find($post->user_id)->name }}</span>
                        <span>
                            <i class="fa-regular fa-comment"></i>
                            {{ count($comments->where('post_id', $post->post_id ?? $post->id)) }}
                        </span>
                    </div>
                    <small>
                        {{ \Illuminate\Support\Facades\Date::parse($post->created_at)->format('d-m-Y') }}
                    </small>

                </div>
            </a>
        </div>
    @endforeach
    <div>
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
