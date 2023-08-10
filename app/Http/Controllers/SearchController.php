<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\View\View;


class SearchController extends Controller
{
    public function getSuggestions(Request $request)
    {
        $query = $request->input('query');

        $subjectSuggestions = Subject::where('name', 'LIKE', "%$query%")
        ->pluck('name')
        ->toArray();

        $topicSuggestions = Topic::where('name', 'LIKE', "%$query%")
            ->pluck('name')
            ->toArray();

        $quizSuggestions = Quiz::where('title', 'LIKE', "%$query%")
            ->pluck('title')
            ->toArray();

        $questionSuggestions = Question::where('text', 'LIKE', "%$query%")
            ->pluck('text')
            ->toArray();

        $suggestions = array_merge($subjectSuggestions, $topicSuggestions, $quizSuggestions, $questionSuggestions);



        return response()->json(['suggestions' => $suggestions]);
    }

  public function redirectToSearch(Request $request)
{
    $query = $request->input('query');
    $encodedQuery = base64_encode($query);

    $searchUrl = route('search', ['query' => urlencode($encodedQuery)]);

    return redirect($searchUrl);

}
public function index(Request $request)
{
    $encodedQuery = $request->input('query');
    $query = base64_decode(urldecode($encodedQuery));  

    $subjects = Subject::with(['topics' => function ($query) {
        $query->orderBy('created_at', 'desc');
    }])
    ->where('name', 'LIKE', "%$query%")
    ->orderBy('created_at', 'desc')
    ->get();

    $topics = Topic::where('name', 'LIKE', "%$query%")
        ->orderBy('created_at', 'desc')
        ->get();

    $quizzes = Quiz::where('title', 'LIKE', "%$query%")
        ->orderBy('created_at', 'desc')
        ->get();

    $questions = Question::where('text', 'LIKE', "%$query%")
        ->orderBy('created_at', 'desc')
        ->get();

    return view('search_result', compact('query','subjects', 'topics', 'quizzes', 'questions'));
}


}
