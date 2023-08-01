@include('head')


@include('navbar')
  
<section class="home">
    <div class="content">
   

    <h3>{{$subject->name}}</h3>
    <p>{{$subject->detail}}</p><br><br>
    @if($quiz)
    <p><strong>Take a quiz by clicking below link</strong><br></p>
    <a class="btn btn-success" href="{{ route('subject.quizzes', $subject->id) }}">{{$quiz->title }} </a> <!-- Add this line -->
    @endif              
</div>

    <div class="image">
    <img src="{{asset('assets/uploads/profile/'.$subject->image_path)}}" alt="">

    </div>

</section>

@if($topics && count($topics) > 0)

<h1 class="heading"> All Topics </h1>

<section class="course">
@foreach($topics as $topic)
    
    <div class="box">
        <span class="amount">$59.99</span>
        <img src="{{asset('assets/uploads/profile/'.$topic->content)}}" alt="">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <h3>{{$topic->name}}</h3>
        <p>{!! nl2br(e(Str::limit($topic->description, 125, '...'))) !!}</p>
        <div class="icons">
            <p> <i class="far fa-clock"></i> 2 hours </p>
            <p> <i class="far fa-calendar"></i> 6 months </p>
            <p> <i class="fas fa-book"></i> 12 modules </p>
        </div>
    </div>
@endforeach
</section>
@endif


@include('footer')











