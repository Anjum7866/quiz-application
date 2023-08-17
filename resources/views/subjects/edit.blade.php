<title> Edit Subject</title>

@extends('admin.layout.master')
   
@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
        <a class="btn btn-primary" href="{{ route('subjects.index') }}"> <i class="fas fa-arrow-left"></i></a>
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
                <form action="{{ route('subjects.update',$subject->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            
                    <div class="row">
                        <div >
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" value="{{ $subject->name }}" class="form-control" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div >
                            <div class="form-group">
                                <strong>Detail:</strong>
                                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $subject->detail }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-3">
                            @if ($subject->image_path)
                            <p><strong>Subject Image:</strong></p> <br>  
                            <img src="{{asset('assets/uploads/profile/'.$subject->image_path)}}" width="100px" height="100px" class="category-img" alt="Subject Image">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-3">
                            <label for="image_path">Upload Image:</label>
                            <input type="file" name="image_path"  id="image_path"  class="form-control">
                            @error('image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">    
                        <div >
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            
                </form>
            </div>
        </div>
</div>

@endsection