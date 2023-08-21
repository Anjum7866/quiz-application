<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('options')->insert([
            // Question 1 options
            [ 
                'text' => 'A technology for storing and accessing data over the internet.',
                'question_id' => 1,
                'points' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'text' => 'A type of local storage in computers.',
                'question_id' => 1,
                'points' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Question 2 options
            [
                'text' => 'SaaS (Software as a Service)',
                'question_id' => 2,
                'points' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'text' => 'IaaS (Infrastructure as a Service)',
                'question_id' => 2,
                'points' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Question 3 options
            [
                'text' => 'Software as a System',
                'question_id' => 3,
                'points' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'text' => 'Software and Applications Service',
                'question_id' => 3,
                'points' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'text' => 'Storage and Access Solutions',
                'question_id' => 3,
                'points' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'text' => 'Software as a Service',
                'question_id' => 3,
                'points' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Question 4 options
            [
                'text' => 'Easy scalability and reduced management effort.',
                'question_id' => 4,
                'points' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'text' => 'Access to hardware-level configurations.',
                'question_id' => 4,
                'points' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Question 5 options
            [
                'text' => 'Public cloud is more expensive than private cloud.',
                'question_id' => 5,
                'points' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'text' => 'Public cloud is shared by multiple organizations, while private cloud is dedicated to a single organization.',
                'question_id' => 5,
                'points' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
