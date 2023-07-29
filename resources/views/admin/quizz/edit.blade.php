@extends('layout.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('edit quizz')}}</h1>
                    <a href="{{ route('quizzes.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="quizz_text">{{ __('quizz title') }}</label>
                        <input type="title" class="form-control" id="title" placeholder="{{$quiz->title}}" name="title" value="{{ old('$quiz->title', $quiz->title) }}" />
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save')}}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->
    
</div>
@endsection