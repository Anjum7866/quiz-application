<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizResult;
use App\Models\Quiz;
use App\Models\Question;
use Carbon\Carbon;


class QuizResultController extends Controller
{
    public function index()
    {
        $QuizResult = QuizResult::where('user_id', auth()->id())
        ->orderByDesc('created_at')
        ->get();
        foreach ($QuizResult as $result) {
            $quizId = $result->quiz_id;
            $score= $result->score;
            $quiz = $result->quiz;
    
            if ($quiz) {
                $totalQuestions = $quiz->questions->count();
                $subjectId = $quiz->subject_id;
            } else {
                $totalQuestions = 0;
            }
        
           
        }
        
        return view('answered_quiz_history', compact('QuizResult', 'totalQuestions', 'subjectId', 'score'));
    } 
    public function checkanswers(){
        dd('testing');
    }
    public function adminquizhistory()
    {
        $QuizResult = QuizResult::where('user_id', auth()->id())
        ->orderByDesc('created_at')
        ->get();
        
        return view('admin/answered_quiz_history', compact('QuizResult'));

    } 

}
