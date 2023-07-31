@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">{{ $subjectWithQuizzes->name }} Quizzes</h2>
                <div class="button"><a class="btn btn-primary" href="{{ route('subjects.show', $subject->id) }}"> Back</a></div>
                <div class="button"><a class="btn btn-primary" href="{{ route('answered-quiz-history') }}">Show All Quiz History</a></div>
           
            </div>

            <div class="sales-details">
                <div class="row">
         
                @if ($subjectWithQuizzes->quizzes->isEmpty())
                    <p>No quizzes available for this subject.</p>
                @else
                    @if (session()->has('score') && session()->has('totalQuestions'))
                        <p>Your score: {{ session('score') }}/{{ session('totalQuestions') }}</p>
                        <a class="btn btn-primary" href="{{ route('certificate.download', ['subject' => $subjectWithQuizzes->id, 'score' => session('score'), 'totalQuestions' => session('totalQuestions')]) }}">Download Certificate</a>
                        @endif

                    <ul>
                        {{-- List individual quizzes with their titles --}}
                        @foreach ($subjectWithQuizzes->quizzes as $quiz)
                            <li>
                                <a href="{{ route('subject.quiz.show', ['subject' => $subjectWithQuizzes->id, 'quiz' => $quiz->id]) }}">
                                    {{ $quiz->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>   
        </div>
</div>

@endsection
