<title>Create Quizz</title>

@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title"><div class="button"><a class="btn btn-primary" href="{{ route('topics.show', $topicId) }}"> {{ __('Go Back') }}</a></div>

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
                            <form action="{{ route('topics.storequiz', $topicId) }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <label for="title">{{ __('quizz title') }}</label>
                                    <input type="title" class="form-control" id="title" placeholder="{{ __('quizz title') }}" name="title" value="{{ old('title') }}" />
                                </div>
                                <div class="row">
                                    <label for="description">{{ __('quizz description') }}</label>
                                    <input type="description" class="form-control" id="description" placeholder="{{ __('quizz description') }}" name="description" value="{{ old('description') }}" />
                                </div>
                              
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                            </form>
                      
            </div>
        </div>
</div>
@endsection