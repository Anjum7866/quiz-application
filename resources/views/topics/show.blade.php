<title>Show Topic</title>

@extends('admin.layout.master')
  
@section('content')
<div class="sales-boxes" >
        <div class="recent-sales box" >
        <a class="btn btn-primary" href="{{ route('subjects.show', $topic->subject_id) }}"> <i class="fas fa-arrow-left"></i></a>
        <div class="button">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></button>
        </div>     
           <!-- <div class="button">  <a href="{{ route('topic.createTopicQuiz', $topic->id) }}" class="btn btn-primary">
                     <span class="icon text-white-50">
                         <i class="fa fa-plus"></i>
                     </span></a></div> -->
                     <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Quiz</h4>
                    </div>
                    <form action="{{ route('topics.storequiz', $topic->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
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
                                <div class="row">
                                    <label for="title">{{ __('quizz title') }}</label>
                                    <input type="title" class="form-control" id="title" placeholder="{{ __('quizz title') }}" name="title" value="{{ old('title') }}" />
                                </div>
                                <div class="row">
                                    <label for="description">{{ __('quizz description') }}</label>
                                    <input type="description" class="form-control" id="description" placeholder="{{ __('quizz description') }}" name="description" value="{{ old('description') }}" />
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-info" >Create Quiz</button>
                            </div>
                    </form>
                </div> 
            </div>
        </div>

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

              </div>
            </div>
            <div class="sales-details">
                @if(count($topic->quizzes) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Topic Quizzes</th>
                            <th>Question</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach($topic->quizzes as $quiz)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $quiz->title }}</td>
                            <td>
                            @if (count($quiz->questions) > 0)
                                {{$quiz->questions->count();}}
                            @else
                                No Questions found.
                            @endif  
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('quizzes.show',$quiz->id) }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                                <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit"><a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></button>
                                        
                                </form>
                            </td>
                        </tr>
                        @php
                            $counter++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No quizzes found.</p>
                @endif
    </div>    
        </div>
</div>
@endsection