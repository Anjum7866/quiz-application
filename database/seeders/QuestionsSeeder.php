<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('questions')->insert([
        [
            'id' =>1,
            'text' => 'What is Cloud Computing?',
            'quiz_id' => 1,
            'topic_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' =>2,
            'text' => 'Which of the following is NOT a cloud service model?',
            'quiz_id' => 1,
            'topic_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' =>3,
            'text' => 'What does SaaS stand for?',
            'quiz_id' => 1,
            'topic_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' =>4,
            'text' => 'What is the main advantage of PaaS (Platform as a Service)?',
            'quiz_id' => 1,
            'topic_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' =>5,
            'text' => 'What is the difference between public cloud and private cloud?',
            'quiz_id' => 1,
            'topic_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}
