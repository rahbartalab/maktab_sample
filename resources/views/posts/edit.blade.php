@extends('layouts.auth')
@section('content')
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

    <input type="submit" name="submit" value="update">
</form>
@endsection
