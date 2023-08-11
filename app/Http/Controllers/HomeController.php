<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Quiz;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
       $subjects = Subject::with(['topics', 'quizzes'])->withCount('topics')->get();
       $firstSubjectId = $subjects->first()->id;

       $singlesubject = Subject::with(['topics.quizzes'])->withCount('topics')->find($firstSubjectId );
        $subjectCount = $subjects->count();
        $teachers = User::where('role', 'teacher')->get();

        return view('welcome', compact('subjects', 'subjectCount', 'singlesubject', 'teachers'));
    }

    public function landingpage()
    {
       $subjects = Subject::with(['topics', 'quizzes'])->withCount('topics')->get();
       $firstSubjectId = $subjects->first()->id;

       $singlesubject = Subject::with(['topics.quizzes'])->withCount('topics')->find($firstSubjectId );
        $subjectCount = $subjects->count();
        $teachers = User::where('role', 'teacher')->get();

        return view('landing', compact('subjects', 'subjectCount', 'singlesubject', 'teachers'));
    }
    
    public function subjects($subjectId)
    {
        $subjects = Subject::with(['topics', 'quizzes'])->withCount('topics')->get();
        $singlesubject = Subject::with(['topics.quizzes'])->withCount('topics')->find($subjectId);
        $subjectCount = $subjects->count();
        return view('subjectdata', compact('subjects', 'singlesubject', 'subjectCount'));
    }
}
