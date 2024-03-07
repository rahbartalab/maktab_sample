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
@if(session('success'))
    <div id="flash_message" role="alert" class="my-2 w-50">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Success
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif
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

<script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous">
</script>
<script>

    setTimeout(function () {
        $('#flash_message').fadeOut();
    }, 3000)

</script>
</body>
</html>

