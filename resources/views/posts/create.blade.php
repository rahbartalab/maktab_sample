@extends('layouts.auth')
@section('content')
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <label for="title">
            title
        </label>
        <br>
        <input value="{{ old('title') }}" type="text" id="title" name="title">
        @error('title')
        {{ $message }}
        @enderror
        <br>

        <label for="description">description</label>
        <br>
        <textarea name="description" id="description" cols="30" rows="10">
        {{ old('description') }}
    </textarea>
        @error('description')
        {{ $message }}
        @enderror
        <br>

        <br>
        {{--    <label for="user_id"></label>--}}
        {{--    <select name="user_id" id="user_id">--}}
        {{--        <option disabled selected value="">--}}
        {{--            select a user--}}
        {{--        </option>--}}
        {{--        @foreach($users as $user)--}}
        {{--            <option value="{{ $user->id }}">--}}
        {{--                {{ $user->fullName }}--}}
        {{--            </option>--}}
        {{--        @endforeach--}}
        {{--    </select>--}}
        {{--    @error('user_id')--}}
        {{--    {{ $message }}--}}
        {{--    @enderror--}}
        <input type="submit" name="submit" value="create">
    </form>
@endsection
