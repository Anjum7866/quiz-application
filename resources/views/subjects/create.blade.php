@extends('layout.master')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Subject</h2>
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
   
<form action="{{ route('subjects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:100px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        
        <!-- End Dynamic Topic Fields -->
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 ">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </div>
   
</form>
@endsection