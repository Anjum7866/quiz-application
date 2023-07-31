@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title"> Quiz</h2>
            </div>
            <div class="sales-details">
                <div class="row">
                    <form method="post" action="{{ route('quiz.submit') }}">
                        @csrf
                        @foreach ($quizQuestions as $key => $question)
                        
                            <p>{{ $question->text }}</p>
                            <div style="display:flex">
                            @foreach ($question->options as $option)
                                <label>
                                    <input type="radio"  name="answers[{{ $question->id }}]" value="{{ $option }}">
                                    {{ $option->text }}
                                </label>
                            @endforeach
                            </div>
                            <br><br>
                        @endforeach
                        <button  class="btn btn-primary " type="submit">Submit Quiz</button>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
