<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<form action="{{ route('posts.update' , $post)  }}" method="post">
    @method('PUT')
    @csrf
    <label for="title">
        title
    </label>
    <br>
    <input value="{{ $post->title }}" type="text" id="title" name="title">
    @error('title')
    {{ $message }}
    @enderror
    <br>

    <label for="description">description</label>
    <br>
    <textarea name="description" id="description" cols="30" rows="10">
        {{ $post->description }}
    </textarea>
    @error('description')
    {{ $message }}
    @enderror
    <br>

    <br>
    <label for="user_id"></label>
    <select name="user_id" id="user_id">
        <option disabled selected value="">
            select a user
        </option>
        @foreach($users as $user)
            <option
                {{ $post->user_id == $user->id ? 'selected'  :'' }}
                value="{{ $user->id }}">
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    @error('user_id')
    {{ $message }}
    @enderror
    <input type="submit" name="submit" value="update">
</form>
</body>
</html>
