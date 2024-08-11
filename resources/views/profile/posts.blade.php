@extends('layouts.profile')
@section('content')
    <h3 my-3>Posts:</h3>

    <table class="table">
        <tbody>

        @foreach($posts as $post)
            <tr>
                <td class="w-75">
                    <a href="{{ route('post.show', $post->id) }}">
                        {{ $post->title }}
                    </a>
                </td>
                <td class="w-25">
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
