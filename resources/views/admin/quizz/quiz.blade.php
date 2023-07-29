@extends('layout.master')

@section('content')
<div class="card">
    <div class="col-sm-6 m-2">
    <h1> Quiz</h1>
    <form method="post" action="{{ route('quiz.submit') }}">
        @csrf
        @foreach ($quizQuestions as $key => $question)
        
            <p>{{ $question->text }}</p>
            @foreach ($question->options as $option)
                <label>
                    <input type="radio"  name="answers[{{ $question->id }}]" value="{{ $option }}">
                    {{ $option->text }}
                </label>
            @endforeach
            <br><br>
        @endforeach
        <button  class="btn btn-primary " type="submit">Submit Quiz</button>
    </form>
</div>
</div>    
@endsection
