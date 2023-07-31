<title>Create Question</title>

@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">{{ __('create question for ' ) }}{{$quizzes->title}}
                <div class="button"><a class="btn btn-primary" href="{{ route('quizzes.show', $quizzes->id) }}"> Back</a></div>
            </div>
            
            @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <div class="sales-details">
           
                <form action="{{ route('questions.store', $quizzes->id) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <label for="text">{{ __('question text') }}</label>
                        <input type="text" class="form-control" id="text" placeholder="{{ __('question text') }}" name="text" value="{{ old('text') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>

            </div>
        </div>
 </div>
@endsection