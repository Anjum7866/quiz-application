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
        ]);

        // Create the subject
        $subject = Subject::create([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
        ]);

        
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
    public function update(Request $request, Subject $subject): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            // 'name.*' => 'required|string|max:255',
            // 'description.*' => 'required|string',
        ]);
          // Update the subject
        $subject->update([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
        ]);

        // Update or create the topics and associate them with the subject
        // $topicData = [];
        // $topicCount = count((array) $request->input('name'));


        //     for ($i = 0; $i < $topicCount; $i++) {
        //         $topicData = [
        //             'name' => $request->input('topic_name')[$i],
        //             'description' => $request->input('topic_description')[$i],
                    
        //         ];
          
            // Handle file uploads and storage for each topic
        //     if ($request->hasFile('image') && $request->file('image')[$i]->isValid()) {
        //         $uploadedFile = $request->file('image')[$i];
        //         $filePath = $uploadedFile->store('images','public');
        //         $topicData['image_path'] = $filePath;
        //     }
           
        // }

        // Update the topics associated with the subject
        // $subject->topics()->delete();
        // $subject->topics()->create($topicData);

      
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
