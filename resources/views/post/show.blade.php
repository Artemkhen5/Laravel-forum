@extends('layouts.app')
@section('content')
    <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="mb-3 d-block">Back</a>
    <div class="mb-3">
        <h4>{{ $post->title }}</h4>
        <div>{{ $post->content }}</div>
    </div>


    @if(\Illuminate\Support\Facades\Auth::user())
        <form action="{{ route('comment.store', $post->id) }}" method="post" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Comment</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif
    <div class="comments mt-3">
        <p>
            <strong>Comments:</strong>
        </p>
        @foreach($comments as $comment)
            <div class="container py-3 border-bottom">
                <div class="mb-2">
                    <strong>{{ \App\Models\User::find($comment->user_id)->name }}</strong>
                </div>
                <div class="mb-2">{{ $comment->content }}</div>
                <small>{{ \Illuminate\Support\Facades\Date::parse($comment->created_at)->format('d-m-Y') }}</small>
            </div>
        @endforeach
    </div>
@endsection

