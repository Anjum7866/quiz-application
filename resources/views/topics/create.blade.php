    
@extends('admin.layout.master')
  
@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Create New Topic</h2>
                <div class="button"><a class="btn btn-primary" href="{{ route('subjects.show', $subject->id) }}"> Back</a></div>
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
               <form action="{{ route('topics.store', $subject->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <label for="subject_id"><strong> Subject Name:</strong>{{ $subject->name }}</label>
                        </div>
                        <div class="row">
                            <label for="name">Topic Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="row">
                            <label for="description">Topic Description:</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        
                        <div class="row ">
                            <label >Upload Image:</label>
                            <input type="file" name="content" id="content" class="form-control">
                        </div>
                        <div class="row ">
                            <label>Select Video:</label>
                            <input type="file" name="video" class="form-control"/>
                        </div>
                        <div class="row">
                            <label>Select File:</label>
                            <input type="file" name="file_path" class="form-control"/>
                        </div>

                        <br>
                        <!-- Add any other fields as needed -->
                        <button type="submit" class="btn btn-primary">Create Topic</button>
                </form>
                </div>
        </div>
</div>


    @endsection