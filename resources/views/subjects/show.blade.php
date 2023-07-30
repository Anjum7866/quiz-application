@extends('layout.master')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Subject</h2>
                <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Back</a>
                <a class="btn btn-success" href="{{ route('subject.quizzes', $subject->id) }}">Show Quiz</a> <!-- Add this line -->
              
              </div>
                <strong>Subject Name:</strong>
                {{ $subject->name }}<br>
                <strong>Subject Description:</strong>
                {{ $subject->detail }}<br>
                @if ($subject->image_path)
                <strong>Subject Image:</strong><br>
                <img src="{{asset('assets/uploads/profile/'.$subject->image_path)}}" width="200px" height="200px"  alt="Subject Image">
                @endif
 
                <br>
              </div>
           
        </div>
    </div>
    <a href="{{ route('topics.create',$subject->id) }}" class="btn btn-success">Add New Topic</a> <!-- Add this line to create a button/link -->
<hr>
 <div class="row">
      
        @foreach ($topics as $topic)
        <div class="row">
  <div class="col-9">
    <div class="card">
      <div class="card-body">
       
        <div class="fluid-container">
          <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
            <div class="ticket-details col-md-8">
              <div class="d-flex">
                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">  <strong>Topic Name:</strong>
                </p>
                <p class="text-primary mr-1 mb-0">{{ $topic->name }}</p>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif

              </div>
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
    </div>
  </div>
</div>
    
@endforeach
    
    
    </div>
    
@endsection