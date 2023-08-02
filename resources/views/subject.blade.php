<title>Subjects</title>


@extends('admin.layout.master')
@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Subjects with Topics</h2>
            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin')
                <div class="button">
                    <a href="{{ route('subjects.create') }}">Add New Subject</a>
                </div>
            @endif
            </div>
            <div class="sales-details">
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
                                <tr class="topic">
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
