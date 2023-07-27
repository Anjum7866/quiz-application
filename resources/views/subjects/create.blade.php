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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:100px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="button" class="btn btn-primary" onclick="toggleTopics()">Add Topics</button>
        </div>


        <!-- Dynamic Topic Fields (Initially Hidden) -->
        <div class="col-xs-12 col-sm-12 col-md-12" id="topics-section" style="display: none;">
            <h2>Topics:</h2>

        <div id="topics" >
            <div class="col-xs-12 col-sm-12 col-md-12 topic">
                <div class="form-group">
                    <strong>Topic Name:</strong>
                    <input type="text" name="topic_name[]" class="form-control" placeholder="Topic Name" required>
                </div>
                <div class="form-group">
                    <strong>Topic Description:</strong>
                    <textarea class="form-control" style="height:100px" name="topic_description[]" placeholder="Topic Description" required></textarea>
                </div>
                <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image[]">
            </div>
            <div class="form-group">
                    <strong>Topic File:</strong>
                    <input type="file" name="topic_file[]" class="form-control">
                </div>

          
            </div>
        </div>
        <button type="button" class="btn btn-success" onclick="addTopic()">Add Another Topic</button>
        </div>

        <!-- End Dynamic Topic Fields -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
<script>
    function toggleTopics() {
        const topicsSection = document.getElementById('topics-section');
        if (topicsSection.style.display === 'none') {
            topicsSection.style.display = 'block';
        } else {
            topicsSection.style.display = 'none';
        }
    }

    function addTopic() {
        const topicsDiv = document.getElementById('topics');
        const topicDiv = document.createElement('div');
        topicDiv.className = 'col-xs-12 col-sm-12 col-md-12 topic';

        topicDiv.innerHTML = `
            <div class="form-group">
                <strong>Topic Name:</strong>
                <input type="text" name="topic_name[]" class="form-control" placeholder="Topic Name" required>
            </div>
            <div class="form-group">
                <strong>Topic Description:</strong>
                <textarea class="form-control" style="height:100px" name="topic_description[]" placeholder="Topic Description" required></textarea>
            </div>
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image[]">
            </div>
            <div class="form-group">
                <strong>PDF:</strong>
                <input type="file" name="pdf[]">
            </div>
            <div class="form-group">
                <strong>Excel Sheet:</strong>
                <input type="file" name="excel_sheet[]">
            </div>

        `;

        topicsDiv.appendChild(topicDiv);
    }
</script>
@endsection