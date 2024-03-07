<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Login</h2>

<form action="{{ route('login.check') }}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="text" id="email" name="email">

    <label for="password">password</label>
    <input type="text" id="password" name="password">

    <input type="submit" name="login">
</form>


</body>
</html>

