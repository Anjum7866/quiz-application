
@extends('admin.layout.master')

@section('content')


        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Subjects</div>
              <div class="number">{{$subjectCount}}</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
           
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Topics</div>
              <div class="number">{{$topicCount}}</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
           
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Users</div>
              <div class="number">{{$userCount}}</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Quizzes</div>
              <div class="number">{{$quizCount}}</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
          
          </div>
        </div>
        <div class="card" style="background:none">
        <h1 style="text-align: center;font-size: x-large;">All Quizes</h1>
        <div class="overview-boxes">
            @foreach($quizzes as $quiz)
            @if ($quiz->questions->count() > 0)
              <div class="box">
                <div class="right-side">  
                  <div class="box-topic"><strong>{{ $quiz->title }}</strong>   
                    <br> {{$quiz->questions->count()}}Questions covering the basics of {{ $quiz->title }}
                    <div class="button">
                    <a href="{{ route('quiz.generate', $quiz->id) }}">Start Quiz</a>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @endforeach
        
    
        </div> 
</div>
        <div class="sales-boxes">
          <div class="top-sales box">
            <div class="title">Top Subjects</div>
            <ul class="top-sales-details">
            @foreach($subjects as $subject)
              <li>
                <a href="#">
                  <img src="{{asset('assets/uploads/profile/'.$subject->image_path)}}" alt="" />
                  <span class="product">{{$subject->name}}</span>
                </a>
                <span class="price">{{$topicCount}}</span>
              </li>
              @endforeach
            </ul>
          </div>
          
        </div>
      
       
      
     


      @endsection
