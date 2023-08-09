<title>Subjects</title>

@extends('admin.layout.master')
  
@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Add New Subject</h2>
                <div class="button"><a class="btn btn-primary" href="{{ route('subjects.index') }}"> Back</a></div>
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
                <form action="{{ route('subjects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                        <div class="row">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="row">
                                <strong>Detail:</strong>
                                <textarea class="form-control" style="height:100px" name="detail" placeholder="Detail"></textarea>
                        </div>
                        <div class="row">
                                <label >Upload Image:</label>
                                <input type="file" name="image_path" id="image_path" class="form-control">
                        </div>
                        <!-- End Dynamic Topic Fields -->
                        <div class="row">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                
                </form>
            </div>
        </div>
</div>

@endsection