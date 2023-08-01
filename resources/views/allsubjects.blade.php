@include('head')
<div >

@include('navbar')
<h1 class="heading"> All Subjects </h1>

<!-- course section  -->

<section class="course">
@foreach($subjects as $subject)
    
    <div class="box">
        <span class="amount">$59.99</span>
        <img src="{{asset('assets/uploads/profile/'.$subject->image_path)}}" alt="">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <h3>{{$subject->name}}</h3>
        <p>{!! nl2br(e(Str::limit($subject->detail, 125, '...'))) !!}</p>
        <a href="{{route('subject.showSingleSubject', $subject->id)}}" class="btn">view more</a>
        <div class="icons">
            <p> <i class="far fa-clock"></i> 2 hours </p>
            <p> <i class="far fa-calendar"></i> 6 months </p>
            <p> <i class="fas fa-book"></i> 12 modules </p>
        </div>
    </div>
@endforeach
   

</section>

@include('footer')

</div>















<!-- custom js file link -->
<script src="js/script.js"></script>

</body>
</html>