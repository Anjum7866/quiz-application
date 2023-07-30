<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizHistoryController extends Controller
{
    public function index()
    {
        // Assuming you have a model called 'QuizHistory' representing the quiz history data
        $quizHistory = \App\Models\QuizHistory::all();

        return view('quiz.history', compact('quizHistory'));
    }

}
