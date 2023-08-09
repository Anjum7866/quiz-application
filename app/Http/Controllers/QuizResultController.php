<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizResult;
use App\Models\Question;
use Carbon\Carbon;


class QuizResultController extends Controller
{
    public function index()
    {
        $QuizResult = QuizResult::where('user_id', auth()->id())
        ->orderByDesc('created_at')
        ->get();
    
        return view('answered_quiz_history', compact('QuizResult'));
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
