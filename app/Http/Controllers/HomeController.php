<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;

class HomeController extends Controller
{
    public function index()
    {
        $subjects = Subject::withCount('topics')->get();
        $subjectCount = $subjects->count();
        return view('welcome', compact('subjects', 'subjectCount'));
    }
}
