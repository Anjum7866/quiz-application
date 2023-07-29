@extends('layout.master')

@section('content')
<div class="container">
    <h2>Edit Topic</h2>
    <a class="btn btn-primary" href="{{ route('topics.index') }}"> Back</a>
  
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
          
    <form action="{{ route('topics.update', $topic->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-6 mt-3">
            <label for="subject_id">Select Subject:</label>
            <select name="subject_id" id="subject_id" class="form-control">
                @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $topic->subject_id == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-6 mt-3">
            <label for="name">Topic Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $topic->name }}" >
        </div>
        <div class="col-6 mt-3">
            <label for="description">Topic Description:</label>
            <textarea name="description" id="description" class="form-control">{{ $topic->description }}</textarea>
        </div>
        <div class="col-6 mt-3">
        @if ($topic->content)
        <p><strong>Topic Image:</strong></p> <br>  
        <img src="{{asset('assets/uploads/profile/'.$topic->content)}}" width="100px" height="100px" class="category-img" alt="Topic Image">
        @endif
        </div>
        <div class="col-6 mt-3">
       
            <label for="content">Upload Image:</label>
            <input type="file" name="content"  id="content"  class="form-control">
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-6 mt-3">
        @if ($topic->video_path) 
              <p><strong>Topic Video:</strong></p> <br>                                          
              <video controls  style="width: 200px; height:200px">
                <source src="{{asset('assets/uploads/profile/'.$topic->video_path)}}" type="video/mp4"  >             
               </video>
        @endif       
        </div>
        <div class="col-md-6 form-group">
            <label>Upload Video:</label>
            <input type="file" name="video_path" class="form-control"/>
            @if($errors->has('video'))
                <span class="text-danger">{{ $errors->first('video') }}</span>
            @endif
        </div>
        @if ($topic->file_path)
        <img src="{{asset('assets/uploads/profile/'.$topic->file_path)}}" width="100px" height="100px" class="category-img" alt="Topic File">
        @endif
        <div class="col-md-6 form-group">
            <label>Upload File:</label>
            <input type="file" name="file_path" class="form-control"/>
            @if($errors->has('file_path'))
                <span class="text-danger">{{ $errors->first('file_path') }}</span>
            @endif
        </div>





        <br>
        <!-- Add any other fields as needed -->
        <button type="submit" class="btn btn-primary">Update Topic</button>
    </form>
</div>
@endsection
