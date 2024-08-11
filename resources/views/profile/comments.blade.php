@extends('layouts.profile')
@section('content')
    <h3 my-3>Comments:</h3>

    <table class="table">
        <tbody>

        @foreach($comments as $comment)
            <tr>
                <td class="w-75">
                    <a href="{{ route('post.show', $comment->post_id) }}">
                        {{ $comment->content }}
                    </a>
                </td>
                <td class="w-25">
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
