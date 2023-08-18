<?php
use Tests\TestCase;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;

class QuestionControllerTest extends TestCase
{

    public function testCreateQuestion()
    {
        $quiz = Quiz::factory()->create();
        $adminUser = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($adminUser);

        $response = $this->post(route('questions.store', $quiz->id), [
            'text' => 'Sample question text',
        ]);

        $response->assertStatus(302); 

        $this->assertDatabaseHas('questions', [
            'text' => 'Sample question text',
            'quiz_id' => $quiz->id,
        ]);
    }

    public function testReadQuestion()
    {
        $adminUser = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($adminUser);
        $question = Question::factory()->create();

        $response = $this->get(route('questions.show', ['question' => $question->id]));

        $response->assertStatus(200);
        $response->assertSee($question->text);
    }

    public function testUpdateQuestion()
    {
        $question = Question::factory()->create();

        $adminUser = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($adminUser);

        $response = $this->put(route('questions.update', ['question' => $question->id]), [
            'text' => 'Updated question text',
            'quiz_id' => $question->quiz_id,
        ]);

        $response->assertStatus(302); 
        $this->assertDatabaseHas('questions', [
            'id' => $question->id,
            'text' => 'Updated question text',
        ]);
    }

    public function testDeleteQuestion()
    {
        $question = Question::factory()->create();

        $adminUser = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($adminUser);

        $response = $this->delete(route('questions.destroy', ['question' => $question->id]));

        $response->assertStatus(302);

        $this->assertDatabaseMissing('questions', ['id' => $question->id]);
    
    }
    public function testShowQuestionsByQuizId()
    {
        $quiz = Quiz::factory()->create();

        $questions = Question::factory()->count(5)->create([
            'quiz_id' => $quiz->id,
        ]);

        $adminUser = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($adminUser);

        $response = $this->get(route('quizzes.show', ['quiz' => $quiz->id]));

        $response->assertStatus(200);

        foreach ($questions as $question) {
            $response->assertSee($question->text);
        }
    }
}
