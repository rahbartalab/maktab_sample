<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        foreach($posts as $post)
        {
            $tags = Tag::query()->inRandomOrder()->take(rand(1, 5))->get();

            foreach ($tags as $tag)
            {
                DB::table('post_tag')->insert([
                    'post_id' => $post->id,
                    'tag_id' => $tag->id
                ]);
            }

        }
    }
}
