<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>title</th>
        <th>description</th>
        <th>user</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->user_id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="text-left">{{ $posts->links() }}</div>

</body>
</html>
