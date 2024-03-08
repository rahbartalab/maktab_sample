<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body >
<form method="POST" action="{{ route('register.check') }}">
    @csrf
    <div>
        <label for="first_name">First Name</label>
            <input type="text" name="first_name" placeholder="First Name">
    </div>
    @error('first_name')
    <p class="text-red-600">{{ $message }}</p>
    @enderror

    <div>
        <label for="last_name">Last Name</label>
         <input type="text" name="last_name" placeholder="Last Name">
    </div>
    @error('last_name')
    <p class="text-red-600">{{ $message }}</p>
    @enderror

    <div>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email">
    </div>
    @error('email')
    <p class="text-red-600">{{ $message }}</p>
    @enderror

    <div>
        <label for="password">Password</label>
         <input type="text" name="password" placeholder="Password">
    </div>

    @error('password')
    <p class="text-red-600">{{ $message }}</p>
    @enderror

    <input type="submit"  name="submit" value="register">
</form>
</body>
</html>
