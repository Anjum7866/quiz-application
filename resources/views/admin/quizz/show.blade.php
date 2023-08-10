<title>Show Quizz</title>

@extends('admin.layout.master')

@section('content')
<div class="sales-boxes" >
        <div class="recent-sales box" >
        <a class="btn btn-primary" href="{{ isset($quiz->subject_id) ? route('subjects.show', $quiz->subject_id) : route('topics.show', $quiz->topic_id) }}">
            <i class="fas fa-arrow-left"></i>
        </a>
      <div class="title">    
                <div class="button">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></button>       
                </div>
            </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Question</h4>
                    </div>
                   
                <form action="{{ route('questions.store', $quiz->id) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <div class="row">
                        <label for="text">{{ __('question text') }}</label>
                        <input type="text" class="form-control" id="text" placeholder="{{ __('question text') }}" name="text" value="{{ old('text') }}" />
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info" >Create Question</button>
                    </div>
                   
                </form>
                </div> 
            </div>
        </div>
              <div class="sales-details">
                <div class="row">
                  <strong>Quizz:</strong>
                  {{ $quiz->title }}<br>
                  <strong>Quizz Description</strong>
                  {{ $quiz->description }}<br>
                 
                </div> 
              </div>
              @if ($questions->count() > 0)

              <div class="sales-details">
              <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question Text</th>
                            <th>Options</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $question->text }}</td>
                                <td>
                                @if (count($question->options) > 0)
                                {{$question->options->count();}}
                                @else
                                    No Options found.
                                @endif  
                                </td>
                                <td>
                                    <div class="row">
                                    <form  action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                    
                                    <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{ route('questions.edit', $question->id) }}"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                                        @csrf
                                        @method('delete') 
                                        <button  type="submit"><a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            @endif
           
        </div>
</div>

   
@endsection

