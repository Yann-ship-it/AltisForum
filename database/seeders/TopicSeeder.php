<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topic::create([
            'topic_name' => 'Laravel',
            'topic_content' => 'Topic content',
            'category_id' => 1,
            'user_id' => 1,
        ]);

        Topic::create([ 
 'topic_name' => 'Java',
            'topic_content' => 'Topic content',
            'category_id' => 2,
            'user_id' => 1,
        ]);
    }
}
