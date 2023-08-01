<title>Questions</title>
@extends('admin.layout.master')

@section('content')

<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title"> {{ __('question') }}</h2>
            </div>
            <div class="sales-details">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No</th>
                            <th>Question Text</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $question->text }}</td>
                                <td>
                                    <div class="row">
                                    <form  action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                    
                                    <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{ route('questions.edit', $question->id) }}"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                                        @csrf
                                        @method('delete') 
                                        <button  type="submit"><a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                    @endforelse
                    </tbody>
                </table>
            
            </div>
        </div>
</div>  
       
@endsection

