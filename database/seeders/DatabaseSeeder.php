<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subject;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        
        $this->call(TopicsSeeder::class);
        $this->call(QuizzesSeeder::class);
        $this->call(QuestionsSeeder::class);
        $this->call(OptionsSeeder::class);
        $this->call(InformationTechnologyQuizSeeder::class);
        User::factory()->count(1)->create();
        Subject::factory()->count(1)->create();

       
    }
}
