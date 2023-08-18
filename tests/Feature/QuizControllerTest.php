<?php
use Tests\TestCase;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\User;
use App\Models\Quiz;

class QuizControllerTest extends TestCase
{
    public function testCreateQuizBySubject()
    {
        $subject = Subject::factory()->create();

        $user = User::factory()->create([
            'role' => 'admin', 
        ]);
        // Authenticate the test user
        $this->actingAs($user);

        $response = $this->get(route('quizzes.create', ['subjectId' => $subject->id]));

        $response->assertStatus(200);
        $response->assertViewIs('admin.quizz.create');
        $response->assertViewHas('subject', $subject);

    }
    public function testEditQuiz()
    {
        $quiz = Quiz::factory()->create();

        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($user);

        $response = $this->get(route('quizzes.edit', ['quiz' => $quiz->id]));

        $response->assertStatus(200);
        $response->assertViewIs('admin.quizz.edit'); 
        $response->assertViewHas('quiz', $quiz);
    }

    public function testUpdateQuiz()
    {
        $quiz = Quiz::factory()->create([
            'subject_id' => null, 
        ]);
        $user = User::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $response = $this->put(route('quizzes.update', ['quiz' => $quiz->id]), [
            'title' => 'Updated Quiz Title',
            'description' => 'Updated quiz description.',
        ]);

        $response->assertStatus(302); 
      
    }
    // public function testCreateQuizByTopic()
    // {
    //     $topic = Topic::factory()->create();
    //     $user = User::factory()->create([
    //         'role' => 'admin', 
    //     ]);
    //     // Authenticate the test user
    //     $this->actingAs($user);
    //     $response = $this->get(route('topic.createTopicQuiz', ['quizId' => $topic->id]));

    //     $response->assertStatus(200);
    //     $response->assertViewIs('admin.quizz.topicquiz');
    //     $response->assertViewHas('topicId', $topic->id);
    // }
}
