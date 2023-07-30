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


class SubjectController extends Controller
{
    public function index(): View
    {
        $subjects = Subject::with(['topics' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->get();
    
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

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject): View
    {
        $topics = $subject->topics()->latest()->get();
      return view('subjects.show', compact('subject', 'topics'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject): View
    {
        $topics = $subject->topics;

        return view('subjects.edit', compact('subject', 'topics'));
    
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
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
    public function showQuizzes(Subject $subject)
    {
        // Get the subject and its quizzes
        $subjectWithQuizzes = $subject->load('quizzes');
        return view('subjects/subject-show', compact('subjectWithQuizzes'));
    }

}
