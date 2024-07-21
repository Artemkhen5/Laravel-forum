@extends('layouts.app')
@section('content')

    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="topic_id" class="form-label">
                Topic
            </label>
            <select class="form-select" name="topic_id" id="topic_id">
                @foreach($topics as $topic)
                    <option
{{--                        {{ old('topic_id') == $topic->id ? ' selected': ''}}--}}
                        value="{{ $topic->id }}">{{ $topic->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
