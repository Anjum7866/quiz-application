<title>Show Subject</title>

@extends('admin.layout.master')
  
@section('content')
<div class="sales-boxes" >
        <div class="recent-sales box" >

            <div class="title">
            <strong>Subject Name:</strong>
                    {{ $subject->name }}<br>
                <div class="button"> <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Back</a>
                <a class="btn btn-success" href="{{ route('subject.quizzes', $subject->id) }}">Show Quiz</a> <!-- Add this line -->
              </div>
              </div>
              <div class="sales-details">
                <div class="row">
                 
                    <strong>Subject Description:</strong>
                    {{ $subject->detail }}<br>
                    @if ($subject->image_path)
                    <strong>Subject Image:</strong><br>
                    <img src="{{asset('assets/uploads/profile/'.$subject->image_path)}}" width="200px" height="200px"  alt="Subject Image">
                    <br>
                    @endif
                    <br>
                </div>
              </div>
            
                <a href="{{ route('topics.create',$subject->id) }}" class="btn btn-success">Add New Topic</a> <!-- Add this line to create a button/link -->

</div>
</div>
<br>
@foreach ($topics as $topic)     
<div class="sales-boxes">

                      
        <div class="recent-sales box">
            
            <div class="sales-details">
              <div class="row">
                        
                                  <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">  <strong>Topic Name:</strong>
                                  </p>
                                  <p class="text-primary mr-1 mb-0">{{ $topic->name }}</p>
                                  @if($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif

                                <p class="text-gray ellipsis mb-2"><strong>Topic Description: {{ $topic->description }}</strong></p>
                              
                                @if ($topic->content)     
                                <label><strong> Topic Image:</strong></label>    <br>                                
                                <img src="{{asset('assets/uploads/profile/'.$topic->content)}}" width="200px" height="200px"  alt="Product Image">
                                @endif

                                @if ($topic->video_path)   
                                <hr>
                                <label><strong>Topic Video:</strong></label><br>
                                <video controls  style="width: 200px; height:200px">
                                  <source src="{{asset('assets/uploads/profile/'.$topic->video_path)}}" type="video/mp4"  >             
                                </video>
                                @endif

                                @if ($topic->file_path)
                                    <hr>
                                    <label><strong>Topic File:</strong></label><br>
                                  
                                    <a href="{{ asset('assets/uploads/profile/' . $topic->file_path) }}" download>Download File</a>
                                @endif

                                <div class="row text-gray d-md-flex d-none">
                                  <div class="col-4 d-flex">
                                    <small class="mb-0 mr-2 text-muted text-muted">Last responded :</small>
                                    <small class="Last-responded mr-2 mb-0 text-muted text-muted">{{$topic->updated_at}}</small>
                                  </div>
                                </div>
                   
    
    
              </div>
            </div>
       </div>
      
</div>
<br>
@endforeach
    
@endsection