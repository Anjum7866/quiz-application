<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;


class SubjectController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->input('query');

        $subjects = Subject::with(['topics' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->where('name', 'LIKE', "%$query%")
        ->orderBy('created_at', 'desc')->paginate(10);
    
        return view('subject', compact('subjects'));
    }

    public function create(): View
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',         
        ]);

        $subject = new Subject;
        $subject->name = $request->input('name');
        $subject->detail = $request->input('detail'); 
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/profile/', $filename);
            $subject->image_path = $filename;
        }
        
        $subject->save(); 
        
        return redirect()->route('subjects.index')->with('success', 'Subject  added successfully!');
    }

    public function show(Subject $subject): View
    {
        $topics = $subject->topics()->latest()->get();
      return view('subjects.show', compact('subject', 'topics'));    
    }

    
    public function edit(Subject $subject): View
    {
        $topics = $subject->topics;

        return view('subjects.edit', compact('subject', 'topics'));
    
    }

  
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,JPG',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->name = $request->input('name');
        $subject->detail = $request->input('detail');
        if($request->hasFile('image_path'))
        {
            $path = 'assets/uploads/profile/'.$subject->image_path;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image_path');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/profile/',$filename);
            $subject->image_path =$filename;
       }
       $subject->save();
      
        return redirect()->route('subjects.index')
                        ->with('success','Subject updated successfully!');
    }

   
    public function destroy(Subject $subject): RedirectResponse
    {
        $subject->delete();
       
        return redirect()->route('subjects.index')
                        ->with('success','Subject deleted successfully');
    }
    public function massDestroy()
    {
        Subject::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
    public function showQuizzes(Subject $subject, $subjectId)
    { 
        // Get the subject and its quizzes
        $userId = Auth::id(); 
        $subjectWithQuizzes = $subject->load('quizzes');
        $quiz = Quiz::where('subject_id', $subjectId)->first();
         if ($quiz) {
            $quizName = $quiz->title;
        }
        $quizId = $quiz->id; 
        
        $quizResult = QuizResult::where('quiz_id', $quizId)
        ->where('user_id', $userId)
        ->first();
        $totalQuestions = Question::where('quiz_id', $quizId)->count();

    
    
        return view('subjects/subject-show', compact('subjectWithQuizzes', 'subject','quizId','subjectId','totalQuestions', 'quizResult','quizName'));
    }

    public function showSubjects(): View
    {
        $subjects = Subject::with(['topics' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->get();
        return view('allsubjects', compact('subjects'));
    }
    
    public function showSingle(Subject $subject): View
    {
        $topics = $subject->topics()->latest()->get();
        $subject_id = $subject->id;
        $quiz = Quiz::where('subject_id', $subject_id)->first();

        return view('subjects.show', compact('subject', 'topics', 'quiz'));    
    }
    public function showSingleSubject(Subject $subject): View
    {
        $topics = $subject->topics()->latest()->get();
        $subject_id = $subject->id;
        $quiz = Quiz::where('subject_id', $subject_id)->first();

        return view('showsinglesubject', compact('subject', 'topics', 'quiz'));    
    }

}
