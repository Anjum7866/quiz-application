<title>Show Subject</title>

@extends('admin.layout.master')
  
@section('content')
<div class="sales-boxes" >
        <div class="recent-sales box">
          <a class="btn btn-primary" href="{{ route('subjects.index') }}"><i class="fas fa-arrow-left"></i> </a>
            <div class="title">
           <p> <strong>{{ $subject->name }}</strong></p>
                <div class="button"> 
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></button>
               
                <!-- <a href="{{ route('topics.create',$subject->id) }}" class="btn btn-success">Add New Topic</a>  -->

                <!-- <a class="btn btn-success" href="{{ route('subject.quizzes', $subject->id) }}">Show Quiz</a> Add this line -->
              </div>
              
              </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Topic</h4>
                    </div>
                    <form action="{{ route('topics.store', $subject->id) }}" method="POST" enctype="multipart/form-data">
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
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-info" >Create Topic</button>
                            </div>
                    </form>
                </div> 
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
            <div class="button">  <a href="{{ route('quizzes.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New quizz') }}</span>
                    </a></div>
        </div>
      </div>
            
    <div class="sales-details" style="display:flex">
                @if(count($topics) > 0)
                <table class="table table-striped" style="width:50%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Topic Name</th>
                            <th>Quizzes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach($topics as $topic)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $topic->name }}</td>
                            <td>
                            @if (count($topic->quizzes) > 0)
                                {{$topic->quizzes->count();}}
                            @else
                                No Quizzes found.
                            @endif  
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('topics.show',$topic->id) }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                                <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display: inline-block;">
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
                <p>No topics found.</p>
                @endif

                @if(count($subject->quizzes) > 0)
                <table class="table table-striped" style="width:50%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject Quizzes</th>
                            <th>Question</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach($subject->quizzes as $quiz)
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