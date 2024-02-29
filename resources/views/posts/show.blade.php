<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h2>{{ $post->title }}</h2>
<p>{{ $post->description }}</p>
<p>writer: {{ $post->user->fullName }}</p>
<p>created at: {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</p>
@foreach($post->tags as $tag)
    <p><a href="">#{{ $tag->name }} </a></p>
@endforeach


</body>
</html>
