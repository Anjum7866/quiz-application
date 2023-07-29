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
                    <h1 class="h3 mb-0 text-gray-800">{{ __('create quizz') }}</h1>
                    <a  class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('quizzes.store') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{ __('quizz title') }}</label>
                        <input type="title" class="form-control" id="title" placeholder="{{ __('quizz title') }}" name="title" value="{{ old('title') }}" />
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('quizz description') }}</label>
                        <input type="description" class="form-control" id="description" placeholder="{{ __('quizz description') }}" name="description" value="{{ old('description') }}" />
                    </div>
                    <div class="form-group">
                        <label for="subject_id">Select Subject</label>
                        <select name="subject_id" id="subject_id" class="form-control" required>
                            <option value="">Select a Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
            
        </div>
    

    <!-- Content Row -->

</div>
@endsection