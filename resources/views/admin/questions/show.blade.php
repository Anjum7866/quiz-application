@extends('admin.layout.master')

<title>Show Questions</title>

@section('content')
<div class="sales-boxes" >
        <div class="recent-sales box" >

            <div class="title">Show Question
                <div class="button"> <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
                </div>
            </div>
            <div class="sales-details">
                <div class="row">
                    <div class="row">
                        <strong>Question:</strong>
                        {{ $question->text }}
                    </div>

                    <div class="row">
                        <strong>Options:</strong>
                        <ul>
                            @foreach ($question->options as $option)
                                <li>{{ $option->text }} (Points: {{ $option->points }})</li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="{{ route('options.create',$question->id) }}" class="btn btn-success">Add Options</a> <!-- Add this line to create a button/link -->
                </div>
            </div>    
        </div>
</div>
    
   
@endsection

