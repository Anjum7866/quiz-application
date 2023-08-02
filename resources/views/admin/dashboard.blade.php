
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
          <div class="recent-sales box">
            <div class="title">List of Topics</h2>
            </div>
            <div class="sales-details">
                @if(count($topics) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Subject</th>
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
      
       
      
     


      @endsection
