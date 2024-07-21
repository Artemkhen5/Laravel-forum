@extends('layouts.profile')
@section('content')
    <h3 my-3>Posts:</h3>

    <table class="table">
        <tbody>

        @foreach($posts as $post)
            <tr>
                <td>
                    <a href="{{ route('post.show', $post->id) }}">
                        {{ $post->title }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
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
