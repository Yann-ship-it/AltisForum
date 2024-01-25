<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TopicCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 1; $i++){
            DB::table('topics_categories')->insert([
                "topic_id" => 1,
                "category_id" => 1,
            ]);
        }

        for ($i = 0; $i < 1; $i++){
            DB::table('topics_categories')->insert([
                "topic_id" => 2,
                "category_id" => 2,
            ]);
        }
    }
}
