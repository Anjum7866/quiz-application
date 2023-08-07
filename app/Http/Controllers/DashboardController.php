<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\User;
use App\Models\Quiz;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subjects = Subject::all();
        $subjectCount = $subjects->count();
        $topics =Topic::all();
        $topicCount=$topics->count();
        $users =User::all();
        $userCount=$users->count();
        $quizzes =Quiz::all();
        $quizCount=$quizzes->count();
        
        return view('admin.dashboard', compact('subjects', 'subjectCount','topics','topicCount','userCount','quizzes', 'quizCount'));

    }
    public function user()
    { 
        $subjects = Subject::with(['topics', 'quizzes'])->withCount('topics')->get();
        $subjectId =Subject::max('id');
        $singlesubject = Subject::with(['topics.quizzes'])->withCount('topics')->find($subjectId);
        $subjectCount = $subjects->count();
        
        return view('subjectdata', compact('subjects', 'singlesubject', 'subjectCount'));
    }
}
