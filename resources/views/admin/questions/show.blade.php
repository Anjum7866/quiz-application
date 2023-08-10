@extends('admin.layout.master')

<title>Show Questions</title>

@section('content')
<div class="sales-boxes" >
        <div class="recent-sales box" >
              
        <a class="btn btn-primary" href="{{ route('quizzes.show',$question->quiz->id) }}"><i class="fas fa-arrow-left"></i></a>
      
        <div class="title">Show Question
        <div class="button"> 
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></button>
        </div>    
            </div>
            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Option</h4>
                    </div>
                    <form action="{{ route('options.store',$question->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label for="name">New Options:</label>
                            <input type="text" name="text" id="text" class="form-control">
                        </div>
                        <div class="row">
                        <label for="new_options">Add Points:</label>
                        <select class="form-control" name="points" id="points">
                            <option value="0">0</option>
                            <option value="1">1</option>         
                        </select> </div>
                        
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-info" >Create Option</button>
                            </div>
                    </form>
                </div> 
            </div>
        </div>
            <div class="sales-details">
                <div class="row">
                        <strong>Question:</strong>
                        {{ $question->text }}<br/>
                        
                        <strong>Options:</strong>
                        <ul>
                        @foreach ($question->options->sortByDesc('created_at') as $option)
                                <li>{{ $option->text }} (Points: {{ $option->points }})</li>
                        @endforeach
                        </ul>
                    </div>
                   
            </div>    
        </div>
</div>
    
   
@endsection

