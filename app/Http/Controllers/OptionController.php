<?php

namespace App\Http\Controllers;
use App\Models\Option;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        $options = Option::latest()->get();

        return view('admin.options.index', compact('options'));
    }
    public function create($questionId)
    {
        $question = Question::findOrFail($questionId);
        return view('admin.options.create', compact('question'));
    }

    public function show($id)
    {
        $option = Option::findOrFail($id);
        
        return view('admin.options.show', compact('option'));
    }

    public function store(Request $request, $questionId)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'points' => 'required|numeric',
        ]);
    
        $option = new Option;
        $option->text = $request->input('text');
        $option->points = $request->input('points');
        $option->question_id = $questionId;
    
        $option->save();
    
        // Check if points are equal to 1
          
        if ($option->points == 1) {
            // Create a new Answer record
            $answer = new Answer;
            $answer->option_id = $option->id; // Store the option_id
            $answer->question_id = $questionId; // Store the question_id
            $answer->save();
        }
    
        $question = Question::findOrFail($questionId);
        $options = $question->options;
    
        // Redirect to the options index page with a success message
        return redirect()->route('questions.show', compact('question', 'options'))->with('success', 'Option created successfully.');
     }


}
