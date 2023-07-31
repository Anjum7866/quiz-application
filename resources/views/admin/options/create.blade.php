    
<title>Options</title>

@extends('admin.layout.master')
  
  @section('content')
  <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Add New Option</h2>
                <div class="button"><a class="btn btn-primary" href="{{ route('questions.show', $question->id) }}"> Back</a></div>
            </div>
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="sales-details">

                    <form action="{{ route('options.store',$question->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <label for="question_id"><strong> Question Name:</strong>{{ $question->name }}</label>
                        </div>
                        <div class="row">
                            <label for="name">New Options:</label>
                            <input type="text" name="text" id="text" class="form-control">
                        </div>
                        <div class="row">
                        <label for="new_options">Add Points:</label>
                        <select class="form-control" name="points" id="points">
                            <option value="0">0</option>
                            <option value="1">1</option>         
                        </select> </div>
                        
                        <br>
                        <!-- Add any other fields as needed -->
                        <button type="submit" class="btn btn-primary">Create Option</button>
                    </form>
  
  @endsection