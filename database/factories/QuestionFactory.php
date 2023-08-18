<?php
namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {
        return [
            'text' => $this->faker->sentence,
            'quiz_id' => function () {
                return \App\Models\Quiz::factory()->create()->id;
            },
        ];
    }
}
