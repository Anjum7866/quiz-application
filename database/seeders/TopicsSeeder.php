<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicsSeeder extends Seeder
{
    public function run()
    {
        DB::table('topics')->insert([
            [
                'id' => 1,
                'name' => 'Artificial Intelligence (AI)',
                'description' => 'AI involves creating intelligent machines that can mimic human cognitive functions such as learning and problem-solving. It includes subfields like machine learning, natural language processing, and computer vision.',
                'content' => '1692265863.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Cloud Computing',
                'description' => 'Cloud computing refers to delivering various computing services (like storage, processing power, and software) over the internet, allowing users to access resources remotely and on-demand.',
                'content' => '1692265946.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
        ]);
    }
}
