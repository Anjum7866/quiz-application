<title>Subjects</title>
 

@extends('admin.layout.master')
@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title" >Subjects</h2>
                <div class="button">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></button>
                </div>   
            </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Subject</h4>
                </div>
                <form action="{{ route('subjects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                <div class="modal-body">
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
                            
                    
                
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-info" >Create Subject</button>
                </div>
                </form>
            </div> 
        </div>
    </div>
            <div class="sales-details">
                @if (count($subjects) > 0)
                        <table class="table table-striped">
                    
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Topics</th>
                                    <th>Quizz</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $rowNumber = 1;
                                @endphp
                                @foreach ($subjects as $subject)
                                <tr class="topic">
                                    <td class="font-weight-medium"> {{$rowNumber}} </td>
                                    <td>{{ $subject->name }}</td>
                                    <td style="width:35%">
                                        {{ implode(' ', array_slice(explode(' ', $subject->detail), 0, 10)) }}
                                        @if (str_word_count($subject->detail) > 10)
                                            ...
                                        @endif
                                    </td>    
                                    <td>
                                        @if (count($subject->topics) > 0)
                                        {{$subject->topics->count();}}
                                        @else
                                        No topics found.
                                        @endif
                                    </td>
                                    <td>
                                        @if (count($subject->quizzes) > 0)
                                        {{$subject->quizzes->count();}}
                                        @else
                                        No Quizzes found.
                                        @endif  
                                    </td>
                                    <td>
                                        <div class="row">
                                        <form action="{{ route('subjects.destroy',$subject->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('subjects.show', $subject->id) }}"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-primary" href="{{ route('subjects.edit',$subject->id) }}"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                                           @csrf
                                            @method('DELETE')
                                        <button  type="submit" class=""><a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></button>
                                        
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                                @php
                                $rowNumber++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>No subjects found.</p>
                        @endif
                    
                <!-- <ul class="details">
                    <li class="topic">Date</li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                    <li><a href="#">02 Jan 2021</a></li>
                </ul> -->
            </div>
        </div>
</div>

@endsection
