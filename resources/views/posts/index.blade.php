@extends('layouts.auth')
@section('content')
    <body>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>slug</th>
            <th>title</th>
            <th>user</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>
                    <a class="text-yellow-700" href="{{ route('posts.show' , $post) }}">
                        {{ $post->slug }}
                    </a>
                </td>
                <td>
                    <a class="text-blue-700" href="{{ route('posts.edit' , $post ) }}">
                        {{ $post->title }}
                    </a>
                </td>
                <td>{{ $post->user->fullName }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-left">{{ $posts->links() }}</div>
@endsection
