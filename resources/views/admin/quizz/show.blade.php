<title>Show Quizz</title>

@extends('admin.layout.master')

@section('content')
<div class="sales-boxes" >
        <div class="recent-sales box" >

            <div class="title">
                <div class="button"> <a class="btn btn-primary" href="{{ route('quizzes.index') }}"> Back</a></div>
            </div>
              <div class="sales-details">
                <div class="row">
                  <strong>Quizz:</strong>
                  {{ $quiz->title }}<br>
                  <a href="{{ route('questions.create', $quiz->id) }}" class="btn btn-primary">
                      <span class="icon text-white-50">
                          <i class="fa fa-plus"></i>
                      </span>
                      <span class="text">{{ __('Add New question') }}</span>
                  </a>
                </div> 
              </div>
        </div>
</div>
<br>
            
                    @foreach ($questions as $question)
                    <div class="sales-boxes">

                      
        <div class="recent-sales box">
            
            <div class="sales-details">

                    <div class="row">
                        <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">  <strong>Question:</strong>
                        </p>
                        <p class="text-primary mr-1 mb-0">{{ $question->text }}</p>
                        @if($errors->has('text'))
                            <span class="text-danger">{{ $errors->first('text') }}</span>
                        @endif
                    </div> 
            </div>
        </div>
       </div>   <br>
              
@endforeach
   
@endsection

