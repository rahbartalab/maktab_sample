<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
//        $user = User::factory()->create([
//            'first_name' => 'amir',
//            'last_name' => 'jafari',
//            'location' => [
//                'address' => 'st13 alley 21',
//                'state' => 'tehran',
//                'city' => 'rasht',
//                'coordinates' => [
//                    'longitude' => 34.44455,
//                    'latitude' => 34.566755
//                ]
//            ]
//        ]);

        $user = User::query()->find(103);
     dd($user->location);
    }
}
