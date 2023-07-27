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
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $subjects = Subject::latest()->paginate(5);
        // $subjects = Subject::all();
        // return view('subject',compact('subjects'))
        //             ->with('i', (request()->input('page', 1) - 1) * 5);

        $subjects = Subject::with(['topics' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->get();
    
        return view('subject', compact('subjects'));
    

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'topic_name.*' => 'required|string|max:255',
            'topic_description.*' => 'required|string',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif', // Adjust the file types and size as needed

        ]);

        // Create the subject
        $subject = Subject::create([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
        ]);

        // Create the topics and associate them with the subject
        $topics = [];
        $topicCount = count($request->input('topic_name'));
        for ($i = 0; $i < $topicCount; $i++) {
            $topicData = [
                'name' => $request->input('topic_name')[$i],
                'description' => $request->input('topic_description')[$i],
                
            ];
          
            // Handle file uploads and storage for each topic
            if ($request->hasFile('image') && $request->file('image')[$i]->isValid()) {
                $uploadedFile = $request->file('image')[$i];
                $filePath = $uploadedFile->store('images','public');
                $topicData['image_path'] = $filePath;
            }
            if ($request->hasFile('topic_file') && $request->file('topic_file')[$i]->isValid()) {
                $uploadedFile = $request->file('topic_file')[$i];
                $uniqueFileName = time().'_'.$uploadedFile->getClientOriginalName();
                $filePath = $uploadedFile->storeAs('topic_files', $uniqueFileName, 'public');
                $topicData['file_path'] = $filePath;
            }



            $topics[] = new Topic($topicData);

        }
  
        $subject->topics()->saveMany($topics);

        return redirect()->route('subjects.index')->with('success', 'Subject with Topics added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject): View
    {
        
        $topics = $subject->topics;

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
            'name.*' => 'required|string|max:255',
            'description.*' => 'required|string',
        ]);
          // Update the subject
        $subject->update([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
        ]);

        // Update or create the topics and associate them with the subject
        $topicData = [];
        $topicCount = count((array) $request->input('name'));


            for ($i = 0; $i < $topicCount; $i++) {
                $topicData = [
                    'name' => $request->input('topic_name')[$i],
                    'description' => $request->input('topic_description')[$i],
                    
                ];
          
            // Handle file uploads and storage for each topic
            if ($request->hasFile('image') && $request->file('image')[$i]->isValid()) {
                $uploadedFile = $request->file('image')[$i];
                $filePath = $uploadedFile->store('images','public');
                $topicData['image_path'] = $filePath;
            }
           
        }

        // Update the topics associated with the subject
        $subject->topics()->delete();
        $subject->topics()->create($topicData);

      
        return redirect()->route('subjects.index')
                        ->with('success','Subject and Topics updated successfully!');
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
}
