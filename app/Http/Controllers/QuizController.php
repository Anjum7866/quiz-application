<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; 
use App\Models\Option; 
use App\Models\Answer; 
use App\Models\Quiz; 
use App\Models\Subject; 
use App\Models\Topic; 
use App\Models\QuizResult; 
use Illuminate\View\View;
use Carbon\Carbon;



class QuizController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::with(['questions' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->get();
        return view('admin.quizz.index', compact('quizzes'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('admin.quizz.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject_id'=>'required|string'
            
        ]);
       
        $quizzes = new Quiz;
        $quizzes->title = $request->input('title');
        $quizzes->description = $request->input('description');
        $quizzes->subject_id = $request->input('subject_id');
        $quizzes->save();
        return redirect()->route('quizzes.index', compact('quizzes'))->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }
    
    public function createTopicQuiz($topicId){
        return view('admin.quizz.topicquiz', compact('topicId'));
    }

    public function storequiz(Request $request, $topicId){
       
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'topic_id'=>$topicId
            
        ]);

        $quizzes = new Quiz;
        $quizzes->title = $request->input('title');
        $quizzes->description = $request->input('description');
        $quizzes->topic_id = $topicId;
        $quizzes->save();
        return redirect()->route('quizzes.index', compact('quizzes'))->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }
    public function show(Quiz $quiz): View
    {
        $questions = $quiz->questions()->latest()->get();
      return view('admin.quizz.show', compact('quiz', 'questions'));    
    }
    public function showQuizz(Subject $subject, Quiz $quiz)
    {
        $quiz->load('questions');
        $Id=$quiz->id;
        return redirect()->route('quiz.generate', compact('quiz','Id', 'subject' ))->with([
            'message' => 'successfully fetched !',
            'alert-type' => 'success'
        ]);
    }



    public function edit(Quiz $quiz)
    {
        return view('admin.quizz.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
         ]);

        $quiz->title = $request->input('title');
        $quiz->description = $request->input('description');

        $quiz->save();

     
        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully!');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully!');
    }

    public function generateQuiz($Id)
    {
        $quizQuestions = Question::where('quiz_id', $Id)
            ->inRandomOrder()
            ->get();
            $quiz = Quiz::find($Id);

        return view('admin.quizz.quiz', compact('quizQuestions', 'quiz'));
    }

    public function submitQuiz(Request $request)
    {
        $userAnswers = $request->input('answers');
        $score = 0;
        $totalQuestions = 0;
         

        foreach ($userAnswers as $questionId => $selectedOptionId) {
            $question = Question::find($questionId);
            $quizId=$question->quiz_id;
            $quizz = Quiz::find($quizId);
            $quizName=($quizz->title);
            $subjectId= $quizz->subject_id;
            $topicId= $quizz->topic_id;
            if (!$question) {
                continue; 
            }
            $selectedOptionArray = json_decode($selectedOptionId, true);

            $id = $selectedOptionArray['id'];

            $isCorrectOption =Option::where('question_id', $questionId)
                ->where('id', $id)
                ->where('points', 1)
                ->exists();
            if ($isCorrectOption) {
                $score++;
            }
            $totalQuestions++;

        }
        $answeredAt =Carbon::now(); 
        QuizResult::create([
            'user_id' => auth()->id(),
            'answered_at' => $answeredAt,
            'score' =>$score,
            'quiz_id' =>$quizId
        ]);
        if ($subjectId) {
            
        return redirect()->route('subject.quizzes',  $subjectId)
        ->with('score', $score)
        ->with('quizId', $quizId)
        ->with('totalQuestions', $totalQuestions);
    } else {
       
        return redirect()->route('topic.quizzes',$topicId)
        ->with('score', $score)
        ->with('quizId', $quizId)
        ->with('totalQuestions', $totalQuestions);
    }

    
    
    }
    
}