<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'user_id' => ['required', 'exists:users,id']
        ]);


        Post::query()->create([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => request('user_id')
        ]);

        return redirect()->route('posts.index');
    }
}
