<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $page = request('page') ?? 1;
        $posts = cache()->remember(
            'posts.' . str($page),
            Controller::DEFAULT_CACHE_SECONDS,
            fn() => Post::query()
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
}
