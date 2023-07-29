@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Question</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <strong>Question:</strong>
        {{ $question->text }}
    </div>

    <div class="form-group">
        <strong>Options:</strong>
        <ul>
            @foreach ($question->options as $option)
                <li>{{ $option->text }} (Points: {{ $option->points }})</li>
            @endforeach
        </ul>
    </div>
    <a href="{{ route('options.create',$question->id) }}" class="btn btn-success">Add Options</a> <!-- Add this line to create a button/link -->
<hr>
 
    
   
@endsection

