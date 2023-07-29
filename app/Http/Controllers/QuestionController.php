<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\QuestionRequest;
use App\Models\Subject;
use App\Models\Quiz;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
   
    public function index(): View
    {
        $questions = Question::all();

        return view('admin.questions.index', compact('questions'));
    }
    public function create($quizzId)
    {
        $quizzes = Quiz::findOrFail($quizzId);
        return view('admin.questions.create', compact('quizzes'));
    }
    public function store(Request $request, $quizzId)
    {
        $request->validate([
            'text' => 'required|string|max:255',
         ]);
         $question = new Question;
         $question->text = $request->input('text');
         $question->quiz_id = $quizzId;
         $question->save();
         $quiz = Quiz::findOrFail($quizzId);

         $questions = $quiz->questions;
         return redirect()->route('quizzes.show', compact('quiz', 'questions'))->with([
             'message' => 'successfully created !',
             'alert-type' => 'success'
         ]);
     }

    public function show($id): View
    {
        $questions = Question::with('options')->findOrFail($id);
        $question = Question::with('options')->findOrFail($id);
        return view('admin.questions.show', compact('questions','question'));
    }

    public function edit(Question $question): View
    {
        $subjects = Subject::all()->pluck('name', 'id');
        
        return view('admin.questions.edit', compact('question', 'subjects'));
    }

    public function update(Request $request, $id): RedirectResponse
    { 
          $request->validate([
            'text' => 'required|string',
        ]);

        // Find the topic by its ID
        $question = Question::findOrFail($id);

        // Update the question with the new values
        $question->text = $request->input('text');
        $question->subject_id = $request->input('subject_id');

        // Save the updated topic to the database
        $question->save();

     
        return redirect()->route('questions.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Question $question): RedirectResponse
    {
        $question->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Question::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    public function storeOptions(Request $request, $id)
    {
        $request->validate([
            'options' => 'required|array',
            'options.*' => 'required|string',
            'points' => 'required|array',
            'points.*' => 'required|integer',
        ]);

        $question = Question::findOrFail($id);

        foreach ($request->input('options') as $key => $optionText) {
            $points = (int)$request->input('points')[$key];

            $option = new Option([
                'text' => $optionText,
                'points' => $points,
            ]);
            $question->options()->save($option);
        }

        return redirect()->route('admin.questions.show', $question->id)->with('success', 'Options added successfully.');
    }
}
