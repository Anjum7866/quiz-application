<!-- resources/views/partials/topic-details.blade.php -->

<strong>{{ $topic->name }}</strong>
<p>{{ $topic->description }}</p>
<img class="image" src="{{ asset('assets/uploads/profile/' . $topic->content) }}" alt="" >
@foreach($topic->quizzes as $quiz)
    <br> Take Quiz By clicking link below<br/>
    <a href='#' data-quiz-id="{{ $quiz->id }}" style="color:black"><strong>*{{ $quiz->title }}*</strong></a><br><br>
@endforeach
