<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertSubjectsData extends Migration
{
    public function up()
    {
        DB::table('subjects')->insert([
            [
                'id' => 32,
                'name' => 'Mathmatics',
                'detail' => 'It is the study of numbers, quantities, patterns, and shapes. It encompasses algebra, geometry, calculus, statistics, and more. Fundamental to science, technology, and everyday life.',
                'image_path' => '1690737601.jpeg',
                'created_at' => '2023-07-27 02:23:35',
                'updated_at' => '2023-07-31 00:20:01',
            ],
            [
                'id' => 33,
                'name' => 'Science',
                'detail' => 'It covers language, literature, and communication. It explores grammar, writing, reading, critical thinking, literary analysis, and enhances communication skills essential in various aspects of life.',
                'image_path' => '1690708330.jpg',
                'created_at' => '2023-07-27 17:16:03',
                'updated_at' => '2023-07-30 19:31:30',
            ],
            [
                'id' => 41,
                'name' => 'Physics',
                'detail' => 'Explores the fundamental principles governing the universe, encompassing forces, motion, energy, and matter.',
                'image_path' => '1690737558.jpeg',
                'created_at' => '2023-07-30 19:41:29',
                'updated_at' => '2023-07-31 00:19:18',
            ],
            [
                'id' => 42,
                'name' => 'Biology',
                'detail' => 'The study of living organisms and their processes, from cellular level to ecosystems and evolutionary history.',
                'image_path' => '1690737523.jpeg',
                'created_at' => '2023-07-30 19:41:52',
                'updated_at' => '2023-07-31 00:18:43',
            ],
            [
                'id' => 43,
                'name' => 'Chemistry',
                'detail' => 'Investigates the composition, structure, and properties of matter, examining reactions and interactions at atomic and molecular levels.',
                'image_path' => '1690737491.jpeg',
                'created_at' => '2023-07-30 19:42:16',
                'updated_at' => '2023-07-31 00:18:11',
            ],
            [
                'id' => 44,
                'name' => 'Literature',
                'detail' => 'Analyzes written works, exploring themes, characters, and artistic expression throughout history and cultures.',
                'image_path' => '1690737431.jpeg',
                'created_at' => '2023-07-30 19:42:39',
                'updated_at' => '2023-07-31 00:17:11',
            ],
            [
                'id' => 45,
                'name' => 'Economics',
                'detail' => 'Examines production, distribution, and consumption of goods and services, impacting global economies and decision-making.',
                'image_path' => '1690737364.jpeg',
                'created_at' => '2023-07-30 19:50:04',
                'updated_at' => '2023-07-31 00:16:04',
            ],
            [
                'id' => 46,
                'name' => 'Information Technology',
                'detail' => 'It encompasses a broad range of technologies, systems, and processes for managing and utilizing information. It plays a pivotal role in modern society, enabling communication, automation, data analysis, cybersecurity, cloud computing, artificial intelligence, and shaping the digital landscape.',
                'image_path' => '1690800248.JPG',
                'created_at' => '2023-07-31 17:43:46',
                'updated_at' => '2023-07-31 17:44:08',
            ],
        ]);
    }

    public function down()
    {
        // Remove the inserted data
        DB::table('subjects')->whereIn('id', [32, 33, 41, 42, 43, 44, 45, 46])->delete();
    }
}
