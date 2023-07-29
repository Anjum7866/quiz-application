    
@extends('layout.master')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Topic</h2>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('subjects.show', $subject->id) }}"> Back</a>
    </div>
    </div>
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
   
<form action="{{ route('topics.store', $subject->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-6 mt-3">
            <label for="subject_id"><strong> Subject Name:</strong>{{ $subject->name }}</label>
        </div>
        <div class="col-6 mt-3">
            <label for="name">Topic Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="col-6 mt-3">
            <label for="description">Topic Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        
        <div class="col-6 mt-3 form-group">
        <label >Upload Image:</label>
        <input type="file" name="content" id="content" class="form-control">
        </div>
        <div class="col-md-6 form-group">
            <label>Select Video:</label>
            <input type="file" name="video" class="form-control"/>
        </div>
        <div class="col-md-6 form-group">
            <label>Select File:</label>
            <input type="file" name="file_path" class="form-control"/>
        </div>

        <br>
        <!-- Add any other fields as needed -->
        <button type="submit" class="btn btn-primary">Create Topic</button>
    </form>

@endsection