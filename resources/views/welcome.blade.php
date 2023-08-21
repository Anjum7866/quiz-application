

@include('navbar')
  <title>E-learning is a better way of learning</title>

<section class="home">
    <div class="content">
        <h3>E-learning is a better way of learning</h3>
        <p>E-learning allows learners to access educational content anytime and anywhere, providing the flexibility to study at their own pace and convenience.
        E-learning platforms often offer a wide range of multimedia resources, such as videos, interactive quizzes, simulations, and e-books, catering to different learning styles and enhancing engagement.</p>
        <a href="{{ route('register') }}" class="btn">get started</a>
    </div>
    <div class="image">
        <img src="assets/images/teacher.png" alt="">
    </div>
</section>

<h1 class="heading"> Popular Subjects </h1>
      
<section class="course">
    @foreach($subjects as $key => $subject)
        @if($key < 6) 
            <div class="box">
                <span class="amount">Free</span>
                <img src="{{asset('assets/uploads/profile/'.$subject->image_path)}}" alt="">
                
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <h3>{{ $subject->name }}</h3>
                <p>{!! nl2br(e(Str::limit($subject->detail, 125, '...'))) !!}</p>

                <a href="{{url('/', $subject->id)}}" class="btn">view more</a>
                <div class="icons">
                    <p> <i class="far fa-clock"></i> 2 hours </p>
                    <p> <i class="far fa-calendar"></i> 6 months </p>
                    <p> <i class="fas fa-book"></i>  {{$subject->topics_count}} topics </p>
                </div>
            </div>
        @endif
    @endforeach
</section>

<div style="text-align: center;"> <a href="{{ url('/allsubjects')}}" class="btn" style="text-align:center">View All Subjects</a></div>


<h1 class="heading"> Experienced Teachers </h1>
<section class="teacher">
    @foreach ($teachers->take(4) as $teacher)

        <div class="box">
            <img src="assets/images/teacher-1.png" alt="">
            <h3>    {{ $teacher->name }}</h3>
            <span>    {{ $teacher->role }}</span>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat, nobis.</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

    @endforeach  
   
</section>

<h1 class="heading"> Contact Us </h1>
<section class="contact">
    <div class="image">
        <img src="assets/images/contact1.png" alt="">
    </div>

    <form action="">

        <div class="inputBox">
            <input type="text" placeholder="name">
            <input type="email" placeholder="email">
        </div>

        <input type="text" placeholder="subject" class="box">

        <textarea placeholder="message" name="" id="" cols="30" rows="10"></textarea>

        <input type="submit" class="btn" value="send">

    </form>
</section>

<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
@include('footer')




