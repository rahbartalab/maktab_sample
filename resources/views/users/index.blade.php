<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('users.index') }}" method="get">
    <label for="q">search from name or email</label>
    <input value="{{ request('q') }}" type="text" name="q" id="q">
    <input type="submit" value="search">
</form>
<table>
    <thead>
    <tr>
        <th>first_name</th>
        <th>last_name</th>
        <th>full name</th>
        <th>email</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($users as $user)
        <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->fullName }}</td>
            <td>{{ $user->email }}</td>
            <td><a href="{{ route('users.posts' , $user) }}">show posts</a></td>
        </tr>
    @empty
        <p>No users</p>
    @endforelse
    </tbody>
</table>

</body>
</html>
