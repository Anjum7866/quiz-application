<title>Edit Quizz</title>

@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
        <a class="btn btn-primary" href="{{ isset($quiz->subject) ? route('subjects.show', $quiz->subject->id) : route('topics.show', $quiz->topic->id) }}">
            <i class="fas fa-arrow-left"></i>
        </a>
    <div class="title">
                <div class="button"></div>
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

                <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <label for="quizz_text">{{ __('quizz title') }}</label>
                        <input type="title" class="form-control" id="title" placeholder="{{$quiz->title}}" name="title" value="{{ old('$quiz->title', $quiz->title) }}" />
                    </div>
                    <div class="row">
                        <label for="quizz_text">{{ __('quizz description') }}</label>
                    <input type="description" class="form-control" id="description" placeholder="{{$quiz->description}}" name="description" value="{{ old('$quiz->description', $quiz->description) }}" />
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save')}}</button>
                </form>
                </div>
        </div>
</div>

@endsection