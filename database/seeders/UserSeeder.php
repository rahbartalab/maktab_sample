<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var User $user */
        $users = User::factory()->count(100)->create();
        foreach ($users as $user) {
            $user->posts()->saveMany(Post::factory(10)->create());
        }
    }
}
