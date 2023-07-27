@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Subjects with Topics</h2>
        </div>
        <!-- Add a link/button to navigate to the form for adding new subjects -->
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('subjects.create') }}">Add New Subject</a>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Orders</h4>
        <div class="table-responsive">
        @if (count($subjects) > 0)

          <table class="table table-striped">
            <thead>
            <tr>
            <th> # </th>
            <th>Name</th>
            <th>Detail</th>
            <th>Topics</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach ($subjects as $subject)
        <tbody>
              <tr>
                <td class="font-weight-medium"> 1  </td>
                <td> {{ $subject->name }}</td>
                <td>{{ $subject->detail }}</td>
                <td>  @if (count($subject->topics) > 0)
                        <ul>
                            @foreach ($subject->topics as $topic)
                                <li>
                                    <strong>{{ $topic->name }}</strong><br>
                                    {{ $topic->description }}
                                    <img src="{{ asset('storage/'.$topic->image_path) }}" alt="Topic Image" style="max-width: 200px; max-height: 200px;">
                               
                                </li>
                                
                            @endforeach
                        </ul>
                    @else
                        No topics found.
                    @endif </td>
                <td> May 15, 2015 </td>
                <td>
                <form action="{{ route('subjects.destroy',$subject->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('subjects.show',$subject->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('subjects.edit',$subject->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
              </tr>
            
            
            </tbody>
       
        @endforeach
    </table>
@else
    <p>No subjects found.</p>
@endif
    
           
      
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
