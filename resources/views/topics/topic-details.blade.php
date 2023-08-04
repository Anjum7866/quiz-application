<!-- resources/views/partials/topic-details.blade.php -->

<li>{{ $topic->name }}</li>
<p>{{ $topic->description }}</p>
<img src="{{ asset('assets/uploads/profile/' . $topic->content) }}" alt="" height="300" width="400">
@foreach($topic->quizzes as $quiz)
    <br> Take Quiz By clicking link below<br/>
    <a href='#' data-quiz-id="{{ $quiz->id }}">{{ $quiz->title }}</a><br><br>
@endforeach
