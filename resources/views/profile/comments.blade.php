@extends('layouts.profile')
@section('content')
    <h3 my-3>Comments:</h3>

    <table class="table">
        <tbody>

        @foreach($comments as $comment)
            <tr>
                <td>
                    <a href="{{ route('post.show', $comment->post_id) }}">
                        {{ $comment->content }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('profile.comments.destroy', $comment->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link text-danger p-0">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

@endsection
