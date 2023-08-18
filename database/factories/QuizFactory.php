<?php
namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'subject_id' => function () {
                return \App\Models\Subject::factory()->create()->id;
            },
            'topic_id' => function () {
                return \App\Models\Topic::factory()->create()->id;
            },
        ];
    }
}
