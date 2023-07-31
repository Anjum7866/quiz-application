<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    public function index()
    {
        // Assuming you have a model called 'QuizResult' representing the quiz history data
        $QuizResult = \App\Models\QuizResult::all();

        return view('quiz.history', compact('QuizResult'));
    }

}
