<!-- topics/index.blade.php -->
@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-lg-8 grid-margin">
        <div class="card">
            <div class="card-body">
                <h2>List of Topics</h2>
                <hr>
    
                @if(count($topics) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach($topics as $topic)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $topic->name }}</td>
                            <td>{{ $topic->subject->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('topics.show',$topic->id) }}">View</a>
                                <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $counter++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No topics found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
