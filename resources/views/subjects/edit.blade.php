@extends('layout.master')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Subject</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Back</a>
            </div>
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
  
    <form action="{{ route('subjects.update',$subject->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $subject->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $subject->detail }}</textarea>
                </div>
            </div>
                    <!-- Form fields to edit topics and their images -->
        @foreach ($topics as $topic)
        <div class="col-xs-12 col-sm-12 col-md-12 topic">
            <div class="form-group">
                <strong>Topic Name:</strong>
                <input type="text" name="topic_name[]" class="form-control" value="{{ $topic->name }}" placeholder="Topic Name" required>
            </div>
            <div class="form-group">
                <strong>Topic Description:</strong>
                <textarea class="form-control" style="height: 100px;" name="topic_description[]" placeholder="Topic Description" required>{{ $topic->description }}</textarea>
            </div>
            <div class="form-group">
                <strong>Topic Image:</strong>
                @if ($topic->image_path)
                    <img src="{{ asset('storage/' . $topic->image_path) }}" alt="Topic Image" style="max-width: 200px;">
                @endif
                <input type="file" name="image[]" class="form-control">
            </div>
        </div>
        @endforeach
        <!-- End Form fields to edit topics and their images -->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection