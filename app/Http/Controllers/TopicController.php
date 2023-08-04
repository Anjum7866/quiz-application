<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Topic;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::latest()->get();

        return view('topics.index', compact('topics'));
    }

   
   
    public function create($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        return view('topics.create', compact('subject'));
    }

    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        $quiz = Quiz::where('topic_id', $id)->first();

        return view('topics.show', compact('topic','quiz'));
    }
    public function showQuizzes(Topic $topic)
    {
        // Get the subject and its quizzes
        $topicWithQuizzes = $topic->load('quizzes');
        return view('topics/topic-show', compact('topicWithQuizzes', 'topic'));
    }

    // Store the newly created topic in the database
    public function store(Request $request, $subjectId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'video' => 'nullable|file|mimetypes:video/mp4',
            'file_path' => 'nullable|file|max:20480|mimes:txt,csv,doc,docx,xls,xlsx,pdf,zip,rar',
         ]);
        
        $topic = new Topic;
        $topic->name = $request->input('name');
        $topic->description = $request->input('description');
        $topic->subject_id = $subjectId;
        
        if ($request->hasFile('content')) {
            $file = $request->file('content');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/profile/', $filename);
            $topic->content = $filename;
        }
        
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $ext = $video->getClientOriginalExtension();
            $filename = Str::uuid().'.'.$ext;
            $video->move('assets/uploads/profile/', $filename);
            $topic->video_path = $filename;
        }
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $ext = $file->getClientOriginalExtension();
            $filename = Str::uuid() . '.' . $ext;
            $file->move('assets/uploads/profile/', $filename);
            $topic->file_path = $filename;
        }
        
        
        $topic->save(); 
        $subject = Subject::findOrFail($subjectId);

        $topics = $subject->topics;
        // Redirect to the topics index page with a success message
        return redirect()->route('subjects.show', compact('subject', 'topics'))->with('success', 'Topic created successfully.');
    }

    // Show the form to edit an existing topic
    public function edit($id)
    {
        // Find the topic by its ID and retrieve the associated subject
        $topic = Topic::findOrFail($id);
        $subject = $topic->subject;

        // Retrieve all subjects to populate the dropdown
        $subjects = Subject::all();

        return view('topics.edit', compact('topic', 'subjects', 'subject'));
    }


    // Update the topic in the database
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'video_path' => 'nullable|file|mimetypes:video/mp4',
            'file_path' => 'nullable|file|max:20480|mimes:txt,csv,doc,docx,xls,xlsx,pdf,zip,rar',
          ]);
      
        $topic = Topic::findOrFail($id);
        // Update the topic with the new values
        $topic->name = $request->input('name');
        $topic->description = $request->input('description');
        $topic->subject_id = $request->input('subject_id');
        if($request->hasFile('content'))
        {
            $path = 'assets/uploads/profile/'.$topic->content;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('content');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/profile/',$filename);
            $topic->content =$filename;
       }
       if($request->hasFile('video_path'))
       {
           $path = 'assets/uploads/profile/'.$topic->video_path;
           if(File::exists($path))
           {
               File::delete($path);
           }
           $file = $request->file('video_path');
           $ext = $file->getClientOriginalExtension();
           $filename = Str::uuid().'.'.$ext;
           $file->move('assets/uploads/profile/',$filename);
           $topic->video_path =$filename;
      }
      if($request->hasFile('file_path'))
      {
          $path = 'assets/uploads/profile/'.$topic->file_path;
          if(File::exists($path))
          {
              File::delete($path);
          }
          $file = $request->file('file_path');
          $ext = $file->getClientOriginalExtension();
          $filename = Str::uuid().'.'.$ext;
          $file->move('assets/uploads/profile/',$filename);
          $topic->file_path =$filename;
     }
    
        // Save the updated topic to the database
        $topic->save();

        // Redirect to the topics index page with a success message
        return redirect()->route('topics.index')->with('success', 'Topic updated successfully.');
    }

    // Delete the topic from the database
    public function destroy( $topicId)
    {
        $topic = Topic::find($topicId);
        $topic->delete();

        return redirect()->route('topics.index')->with('success', 'Topic deleted successfully.');
    }
    public function getDetails($topicId)
    {
        $topic = Topic::with('quizzes')->find($topicId);

        // Return HTML content with the topic details
        return view('topics.topic-details', ['topic' => $topic]);
    }

}
