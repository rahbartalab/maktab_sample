<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        /** @var User $user */
        $user = User::query()->find(1);
//        $user->posts()->saveMany(Post::factory(10)->create());
    }
}
