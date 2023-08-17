<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('quizzes')->insert([
            [
                'title' => 'Cloud Computing Quiz',
                'description' => 'Quiz about Cloud Computing',
                'topic_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    
}
