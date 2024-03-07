<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="bg-slate-500 p-4 text-white font-bold">
    {{ $user->fullName }}
</div>
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

</body>
</html>
