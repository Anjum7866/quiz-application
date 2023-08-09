<title>Edit Topic</title>

@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
          
        <div class="recent-sales box">
            <a class="btn btn-primary" href="{{ route('subjects.show', $topic->subject_id) }}"> <i class="fas fa-arrow-left"></i></a>
            <div class="title">
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
                <form action="{{ route('topics.update', $topic->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label for="name">Topic Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $topic->name }}" >
                    </div>
                    <div class="row">
                        <label for="description">Topic Description:</label>
                        <textarea name="description" id="description" class="form-control">{{ $topic->description }}</textarea>
                    </div>
                    <div class="row">
                        @if ($topic->content)
                        <p><strong>Topic Image:</strong></p> <br>  
                        <img src="{{asset('assets/uploads/profile/'.$topic->content)}}" width="100px" height="100px" class="category-img" alt="Topic Image">
                        @endif
                    </div>
                    <div class="row">          
                        <label for="content">Upload Image:</label>
                        <input type="file" name="content"  id="content"  class="form-control">
                        @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        @if ($topic->video_path) 
                        <p><strong>Topic Video:</strong></p> <br>                                          
                        <video controls  style="width: 200px; height:200px">
                            <source src="{{asset('assets/uploads/profile/'.$topic->video_path)}}" type="video/mp4"  >             
                        </video>
                        @endif       
                    </div>
                    <div class="row">
                        <label>Upload Video:</label>
                        <input type="file" name="video_path" class="form-control"/>
                        @if($errors->has('video'))
                            <span class="text-danger">{{ $errors->first('video') }}</span>
                        @endif
                    </div>
                    @if ($topic->file_path)
                    <img src="{{asset('assets/uploads/profile/'.$topic->file_path)}}" width="100px" height="100px" class="category-img" alt="Topic File">
                    @endif
                    <div class="row">
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
        </div>
</div>
@endsection
