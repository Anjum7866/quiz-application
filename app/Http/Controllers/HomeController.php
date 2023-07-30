<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class HomeController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $subjectCount = $subjects->count();
        return view('welcome', compact('subjects', 'subjectCount'));
     
    }
}
