@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Quizz</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('quizzes.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <strong>Quizz:</strong>
        {{ $quiz->title }}
    </div>

    <a href="{{ route('questions.create', $quiz->id) }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Add New question') }}</span>
                    </a>
 
                    @foreach ($questions as $question)
        <div class="row">
  <div class="col-9">
    <div class="card">
      <div class="card-body">
       
        <div class="fluid-container">
          <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
            <div class="ticket-details col-md-8">
              <div class="d-flex">
                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">  <strong>Question:</strong>
                </p>
                <p class="text-primary mr-1 mb-0">{{ $question->text }}</p>
                @if($errors->has('text'))
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                @endif

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    
@endforeach
   
@endsection

