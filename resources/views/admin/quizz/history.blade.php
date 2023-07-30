<!-- resources/views/quiz/history.blade.php -->
@extends('layout.master') <!-- Assuming you have a layout file, update the path accordingly -->

@section('content')
    <div class="container">
        <h1>Answered Quiz History</h1>
        @if($quizHistory->isEmpty())
            <p>No quiz history available.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Quiz Name</th>
                        <th>Date Answered</th>
                        <!-- Add other relevant columns here -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizHistory as $history)
                        <tr>
                            <td>{{ $history->quiz_name }}</td>
                            <td>{{ $history->answered_at }}</td>
                            <!-- Add other relevant columns' data here -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
