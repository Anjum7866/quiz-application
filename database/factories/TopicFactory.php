<?php

namespace Database\Factories;
use App\Models\Topic;
use App\Models\Subject;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Topic::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->paragraph,
            'subject_id'=>Subject::factory(),
            // You can add more attributes as needed
        ];
    }
}
