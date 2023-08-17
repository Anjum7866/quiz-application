<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformationTechnologyQuizSeeder extends Seeder
{
    public function run()
    {
        // Create a new quiz for Information Technology
        $quizId = DB::table('quizzes')->insertGetId([
            'title' => 'Information Technology Quiz',
            'description' => 'Quiz about Information Technology',
            'subject_id' => 46, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert questions and options
        $questions = [
            [
                'text' => 'What is an IP address used for?',
                'options' => [
                    'Identifying a person online',
                    'Controlling computer power usage',
                    'Determining a computer\'s location on a network',
                    'Enhancing Wi-Fi signal strength',
                ],
                'correct_option' => 2, 
            ],
            [
                'text' => 'What does HTML stand for?',
                'options' => [
                    'Hyper Text Markup Language',
                    'High Technology Modern Language',
                    'Hyperlink and Text Markup Language',
                    'Hyper Transfer Markup Language',
                ],
                'correct_option' => 0,
            ],
            [
                'text' => 'What is a CPU?',
                'options' => [
                    'Computer Processing Unit',
                    'Central Peripheral Unit',
                    'Core Programming Unit',
                    'Computer Power Usage',
                ],
                'correct_option' => 0,
            ],
            [
                'text' => 'What is the purpose of a firewall?',
                'options' => [
                    'To warm up the computer',
                    'To control internet speed',
                    'To block unwanted network traffic',
                    'To enhance video graphics',
                ],
                'correct_option' => 2,
            ],
            [
                'text' => 'What is the difference between RAM and ROM?',
                'options' => [
                    'RAM is temporary storage, while ROM is permanent storage',
                    'RAM is used for graphics, while ROM is used for text',
                    'RAM is a type of external storage, while ROM is internal storage',
                    'RAM and ROM are the same thing',
                ],
                'correct_option' => 0,
            ],
        ];

        foreach ($questions as $questionData) {
            $questionId = DB::table('questions')->insertGetId([
                'text' => $questionData['text'],
                'quiz_id' => $quizId,
                'subject_id' => 46, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($questionData['options'] as $index => $optionText) {
                DB::table('options')->insert([
                    'text' => $optionText,
                    'question_id' => $questionId,
                    'points' => ($index === $questionData['correct_option']) ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
