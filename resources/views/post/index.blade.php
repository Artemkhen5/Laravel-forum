@extends('layouts.app')
@section('content')
    @if(\Illuminate\Support\Facades\Auth::user())
        <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">
            New post
        </a>
    @endif
    @foreach($posts as $post)
        <div class="card p-3 mb-3">
            <a href="{{ route('post.show', $post->id)}}" class="text-decoration-none text-dark">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <div>
                    <div class="d-flex align-items-center">
                        <span class="me-3"><b>Author: </b> {{ $user::find($post->user_id)->name }}</span>
                        <span>
                            <i class="fa-regular fa-comment"></i>
                            {{ count($comments->where('post_id', $post->id)) }}
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
