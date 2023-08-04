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
                            <th>Subject/Topic</th>
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
                            <td>
                                @if ($quiz->subject)
                                    {{ $quiz->subject->name }}
                                @elseif($quiz->topic)
                                    {{ $quiz->topic->name }}
                                @endif
                                </td>

                            <td>
                                <a class="btn btn-info" href="{{ route('quizzes.show',$quiz->id) }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                                <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit"><a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></button>
                                        
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
