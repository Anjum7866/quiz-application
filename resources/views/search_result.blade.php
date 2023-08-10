@extends('admin.layout.master')

@section('content')
    <h2>Search Results</h2>
@if (!$query)
        <p>No search query provided.</p>
@else

    @if ($subjects->count() > 0)
    <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title" >Subjects
            </div>
        <ul>
            @foreach ($subjects as $subject)
            <div class="sales-details">
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
            </div>
            @endforeach
        </ul>
        </div>
    </div>
    <br/><br/>
    @endif

    @if ($topics->count() > 0)
    <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title" >Topics
            </div>
        <ul>
            @foreach ($topics as $topic)
            <div class="sales-details">
            <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Topic Name</th>
                            <th>Quizzes</th>
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
                            <td>
                            @if (count($topic->quizzes) > 0)
                                {{$topic->quizzes->count();}}
                            @else
                                No Quizzes found.
                            @endif  
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('topics.show',$topic->id) }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                                <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display: inline-block;">
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
            </div>
                @endforeach
        </ul>
        </div>
    </div>
    <br/><br/>
    @endif

    @if ($quizzes->count() > 0)
    <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title" >Quizzes
            </div>
        <ul>
            @foreach ($quizzes as $quiz)
            <div class="sales-details">
            <table class="table table-striped" >
            <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject Quizzes</th>
                            <th>Question</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $quiz->title }}</td>
                            <td>
                            @if (count($quiz->questions) > 0)
                                {{$quiz->questions->count();}}
                            @else
                                No Questions found.
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
                    </tbody>
            </table>
            </div>
                @endforeach
        </ul>
        </div>
    </div>
    <br/><br/>
    @endif

    @if ($questions->count() > 0)
        <div class="sales-boxes">
            <div class="recent-sales box">
                <div class="title">Questions</div>
                <ul>
                    <div class="sales-details">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Question Text</th>
                                    <th>Options</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr data-entry-id="{{ $question->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $question->text }}</td>
                                        <td>
                                        @if (count($question->options) > 0)
                                        {{$question->options->count();}}
                                        @else
                                            No Options found.
                                        @endif  
                                        </td>
                                        <td>
                                            <div class="row">
                                                <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('questions.show', $question->id) }}"><i class="fas fa-eye"></i></a>
                                                    <a class="btn btn-primary" href="{{ route('questions.edit', $question->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </ul>
            </div>
        </div>
    @endif
@endif

    @if ($subjects->count() === 0 && $topics->count() === 0 && $quizzes->count() === 0 && $questions->count() === 0)
        <p>No results found.</p>
    @endif
@endsection
