<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizResult;
use Carbon\Carbon;


class QuizResultController extends Controller
{
    public function index()
    {
        $QuizResult = QuizResult::where('user_id', auth()->id())->get();

        // Convert the timestamp to a human-readable format
        foreach ($QuizResult as $result) {
            $result->human_readable_time = $this->getHumanReadableTime($result->answered_at);
        }
        return view('answered_quiz_history', compact('QuizResult'));

    }
    private function getHumanReadableTime($timestamp)
    {
    $carbonTime = Carbon::parse($timestamp);
    $now = Carbon::now();

    // Check if the timestamp is within the last hour
    if ($carbonTime->diffInMinutes($now) < 60) {
        return $carbonTime->diffForHumans($now);
    } else {
        return $carbonTime->format('Y-m-d H:i:s');
    }
}


}
