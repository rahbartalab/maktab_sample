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
<h2>Login</h2>

<form action="{{ route('login.check') }}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="text" id="email" name="email">
    @error('email')
    <p class="text-red-600">{{ $message }}</p>
    @enderror
    <br>
    <label for="password">password</label>
    <input type="password" id="password" name="password">
    @error('password')
    <p class="text-red-600">{{ $message }}</p>
    @enderror

    <input class="py-1 px-2 rounded-xl bg-slate-700 text-white" type="submit" name="login">
</form>


</body>
</html>

