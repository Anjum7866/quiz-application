@extends('subjects.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD Testing Subjects</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('subjects.create') }}"> Create New Subject</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    
    <div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Orders</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Name </th>
                <th>Details</th>
                <th width="280px">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($subjects as $subject)
        <tr>
            <td class="font-weight-medium">{{ ++$i }}</td>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->detail }}</td>
            <td>
                <form action="{{ route('subjects.destroy',$subject->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('subjects.show',$subject->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('subjects.edit',$subject->id) }}"><i class="fas fa-pencil-alt"></i></a>&nbsp;
   
                    @csrf
                    @method('DELETE')
      
                    <button  type="submit"><a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></button>
                                        
                </form>
            </td>
        </tr>
        @endforeach
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
    {!! $subjects->links() !!}
      
@endsection