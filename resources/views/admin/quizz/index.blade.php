<title>Quizz</title>

@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">
            <div class="button">  <a href="{{ route('quizzes.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New quizz') }}</span>
                    </a></div>
            </div>
            <div class="sales-details">
            @if(count($quizzes) > 0)
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
                        @foreach($quizzes as $quiz)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $quiz->title }}</td>
                            <td>{{ $quiz->subject->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('quizzes.show',$quiz->id) }}">View</a>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display: inline-block;">
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
                <p>No quizzes found.</p>
                @endif
            </div>
        </div>
</div>  

        
@endsection
