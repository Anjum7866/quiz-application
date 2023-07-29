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

                    <h1 class="h3 mb-0 text-gray-800">{{ __('create question for ' ) }}{{$quizzes->title}}</h1>
                    <a  class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('questions.store', $quizzes->id) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="text">{{ __('question text') }}</label>
                        <input type="text" class="form-control" id="text" placeholder="{{ __('question text') }}" name="text" value="{{ old('text') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection