<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-200">
<div class="bg-slate-500 p-4 text-white font-bold">
    {{ $user->fullName }}
    <a class="text-blue-300" href="{{ route('posts.index') }}">posts</a>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input class="cursor-pointer hover:text-red-600 transition" type="submit" value="logout">
    </form>
</div>

@yield('content')

</body>
</html>

