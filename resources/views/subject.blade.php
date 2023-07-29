@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Subjects with Topics</h2>
        </div>
        <!-- Add a link/button to navigate to the form for adding new subjects -->
        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('subjects.create') }}">Add New Subject</a>
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-lg-8 grid-margin ">
        <div class="card ">
            <div class="card-body">
                <h4 class="card-title">Orders</h4>
                <div class="table-responsive">
                    @if (count($subjects) > 0)
                    <table class="table table-striped">
                 
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>Name</th>
                                <th>Topics</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $rowNumber = 1;
                            @endphp
                            @foreach ($subjects as $subject)
                            <tr>
                                <td class="font-weight-medium"> {{$rowNumber}} </td>
                                <td>{{ $subject->name }}</td>
                                <td>
                                    @if (count($subject->topics) > 0)
                                    <ul>
                                        @foreach ($subject->topics as $topic)
                                        <li>
                                            <strong>{{ $topic->name }}</strong><br>
                                          </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    No topics found.
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('subjects.destroy',$subject->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('subjects.show',$subject->id) }}">View</a>
                                        <a class="btn btn-primary" href="{{ route('subjects.edit',$subject->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
