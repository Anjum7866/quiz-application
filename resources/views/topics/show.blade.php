<title>Show Topic</title>

@extends('admin.layout.master')
  
@section('content')
<div class="sales-boxes" >
        <div class="recent-sales box" >

            <div class="title">
                <div class="button"> <a class="btn btn-primary" href="{{ route('topics.index') }}"> Back</a>
                <a class="btn btn-success" href="{{ route('quiz.generate', $topic->id) }}">Show Quiz</a> <!-- Add this line -->
                </div>
            </div>
            <div class="sales-details">
              <div class="row">
              <p><strong>Subject Name:</strong> {{ $topic->subject->name }}</p>
              </div>
            </div>
        </div>
</div>
<br>
<div class="sales-boxes" >
        <div class="recent-sales box" >
            <div class="sales-details">
              <div class="row">
                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">  <strong>Topic Name:</strong>
                </p>
                <p class="text-primary mr-1 mb-0">{{ $topic->name }}</p>
              <p class="text-gray ellipsis mb-2"><strong>Topic Description: {{ $topic->description }}</strong></p>
              @if ($topic->content) 
              <p><strong>Topic Image:</strong></p>  <br>                                      
              <img src="{{asset('assets/uploads/profile/'.$topic->content)}}" width="200px" height="200px"  alt="Topic Image">
              @endif
              @if ($topic->video_path) 
              <p><strong>Topic Video:</strong></p> <br>                                          
              <video controls  style="width: 200px; height:200px">
                <source src="{{asset('assets/uploads/profile/'.$topic->video_path)}}" type="video/mp4"  >             
               </video>
               @endif
               @if ($topic->file_path)
                  <hr>
                  <label><strong>Topic File:</strong></label><br>
                
                  <a href="{{ asset('assets/uploads/profile/' . $topic->file_path) }}" download>Download File</a>
              @endif

                  <small class="mb-0 mr-2 text-muted text-muted">Last responded :</small>
                  <small class="Last-responded mr-2 mb-0 text-muted text-muted">{{$topic->updated_at}}</small>
                  </div>
            </div>
        </div>
</div>
@endsection