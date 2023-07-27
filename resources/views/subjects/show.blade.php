@extends('layout.master')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Subject</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
 <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $subject->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $subject->detail }}
            </div>
        </div>
        @foreach ($topics as $topic)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Topic Name:</strong>
                {{ $topic->name }}
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Topic Description:</strong>
                {{ $topic->description }}
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <!-- Display the image if available -->
                @if ($topic->image_path)
                <strong>Topic Image:</strong><br>
                    <img src="{{ asset('storage/' . $topic->image_path) }}" alt="Topic Image" style="max-width: 200px;">
                @endif
                </div>
        </div>
                <!-- Display the download link for the file if available -->
              
        @endforeach

    </div>
@endsection