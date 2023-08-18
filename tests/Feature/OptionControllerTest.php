<?php
use Tests\TestCase;
use App\Models\Question;
use App\Models\Option;
use App\Models\User;

class OptionControllerTest extends TestCase
{

    public function testCreateOption()
    {
        $question = Question::factory()->create();
        $adminUser = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($adminUser);

        $response = $this->post(route('options.store', $question->id), [
            'text' => 'Sample question text',
            'points' =>1
        ]);

        $response->assertStatus(302); 

        $this->assertDatabaseHas('options', [
            'text' => 'Sample question text',
            'question_id' => $question->id,
        ]);
    }

   
   }

