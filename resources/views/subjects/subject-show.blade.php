@extends('layout.master')

@section('content')
    <h1>{{ $subjectWithQuizzes->name }} Quizzes</h1>

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
@endsection
