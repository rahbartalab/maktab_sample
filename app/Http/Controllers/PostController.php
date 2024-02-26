<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $page = request('page') ?? 1;
        $posts = cache()->remember(
            'posts.' . str($page),
            Controller::DEFAULT_CACHE_SECONDS,
            fn() => Post
                ::searchTitle()
                ->searchDescription()
                ->paginate(request('limit') ?? Controller::DEFAULT_PAGINATE)
        );

        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        $users = cache()->remember(
            'users',
            Controller::DEFAULT_CACHE_SECONDS,
            fn() => User::all()
        );
        return view('posts.create', compact('users'));
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Post::query()->create($validated);
        return redirect()->route('posts.index');
    }

    public function edit(Post $post): View
    {
        $users = cache()->remember(
            'users',
            Controller::DEFAULT_CACHE_SECONDS,
            fn() => User::all()
        );
        return view('posts.edit',
            compact('post', 'users'));
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();
        $post->update($validated);
        return redirect()->route('posts.edit', $post);
    }

    public function show(Post $post)
    {
        dd($post->toArray());
    }
}
