
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
            <i class="bx bx-cart-alt cart"></i>
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
            <i class="bx bxs-cart-add cart two"></i>
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
            <i class="bx bx-cart cart three"></i>
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
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Recent Topics</div>
            
              @foreach($topics as $topic)
              <div class="sales-details">
              <ul class="details">
                <li><a href="#">{{$topic->name}}</a></li>
               </ul>
              </div>
              @endforeach
            
            <div class="button">
              <a href="/topics">See All</a>
            </div>
          </div>
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
