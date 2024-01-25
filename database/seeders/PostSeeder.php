<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'post_name' => 'Post test title',
            'post_content' => 'Contenu du post',
            'user_id' => 1,
            'category_id' => 1,
            'topic_id' => 1,
        ]);

        Post::create([
            'post_name' => 'Post title',
            'post_content' => 'Contenu post',
            'user_id' => 11,
            'category_id' => 2,
            'topic_id' => 2,
        ]);
    }
}
