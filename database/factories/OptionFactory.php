<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Option;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Option::class;

    public function definition(): array
    {
        return [
            'question_id' => factory(App\Models\Question::class),
            'text' => $faker->sentence,
            'points' => $faker->randomElement([0, 1]),
    
        ];
    }
}
