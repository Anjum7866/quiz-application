<title>Edit Questions</title>

@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
        <a href="{{ route('quizzes.show', $question->quiz->id) }}" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-arrow-left"></i></a>
            <div class="title">
                <div class="button">   
               </div>
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
                <form action="{{ route('questions.update', $question->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="question_text">{{ __('question text') }}</label>
                        <input type="text" class="form-control" id="text" placeholder="{{$question->text}}" name="text" value="{{ old('$question->text', $question->text) }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save')}}</button>
                </form>
            </div>
        </div>

</div>
@endsection