<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- <link rel="stylesheet" href="https://altonaviation.com/wp-content/themes/twentytwentyone/js/owl.carousel.js"> -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="theme-stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />
<style>
    .btn:hover{
  background:var(--gradient);
  transform: scale(1.05);
} 
.btn {
  display: inline-block;
  margin-top: 1rem;
  padding: .8rem 3rem;
  border-radius: 2rem;
  background: var(--gradient);
  color: #fff;
  cursor: pointer;
  font-size: 1.9rem;
  line-height: 30px;
  position: relative;
  overflow: hidden;
  box-shadow: 0 0 0 2px var(--gradient);
}
.navbar {
  margin-left: auto;
}
/* Toggle switch styles */
.theme-switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.theme-switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: 0.4s;
  border-radius: 20px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 14px;
  width: 14px;
  left: 3px;
  bottom: 3px;
  background-color: #fff;
  transition: 0.4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #2196f3;
}

input:checked + .slider:before {
  transform: translateX(20px);
}

/* Additional styling for the slider */
.slider.round {
  border-radius: 20px;
}

.slider.round:before {
  border-radius: 50%;
}

/* Styles for sun and moon icons */
.sun-icon,
.moon-icon {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 18px;
}

.sun-icon {
  left: 3px;
  color: #f1c40f; /* Yellow color for sun icon */
}

.moon-icon {
  right: 3px;
  color: #95a5a6; /* Gray color for moon icon */
}

/* Hide the sun icon for dark theme */
body.dark-theme .sun-icon {
  display: none;
}

/* Hide the moon icon for light theme */
body:not(.dark-theme) .moon-icon {
  display: none;
}
nav{
  position: relative;
}
ul{
  list-style: none;
  display: flex;
  align-items: center;
  margin: auto;
}
.display-picture{
  margin-left: auto;
}
.display-picture img{
  width: 50px;
  border-radius: 50%;
  border:2px solid #fff;
}
.display-picture img:hover{
border:2px solid #E78341;
}
.profile-card{
  transition: 0.5s ease;
}

.profile-card ul{
  display: flex;
  align-items: flex-start;
  flex-direction: column;
  background: #E78341;
  position: absolute;
  /* top: 4rem; */
  right:0rem;
border-radius: 10px;
padding: 10px 50px 10px 20px;
}
.profile-card ul li{
 
  padding: 5px 0;
  color: #FFF;
  font-size: 14px;
}
.hidden{
  display: none;
}
a{
  text-decoration: none !important;
  color:#fff;
  font-size: medium;
}


   
</style>
        <!-- <link rel="stylesheet" href="https://altonaviation.com/wp-content/themes/twentytwentyone/css/owl.carousel.min.css"> -->
    </head>
    <body >
  
        <header>
                <a href="#" class="logo">Tecnolynx<span>Global</span></a>

                    <div id="menu" class="fas fa-bars"></div>

                    <nav class="navbar">
                        @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                            <a href="{{ url('/allsubjects')}}">Subjects</a>
                            <a href="{{ url('/teacher')}}">teacher</a>
                            <a href="{{ url('/price')}}">price</a>
                            <a href="{{ url('/review') }}">review</a>
                            <a href="{{ url('/contact') }}">contact</a>
                        @else
                        <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        <a href="{{ url('/allsubjects')}}">Subjects</a>
                            <a href="{{ url('/teacher')}}">teacher</a>
                            <a href="{{ url('/price')}}">price</a>
                            <a href="{{ url('/review') }}">review</a>
                            <a href="{{ url('/contact') }}">contact</a>
                            <a href="{{ route('user.login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                            

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                
                        @endif
       
                    </nav>
                    @auth
                    <nav>
                      <ul>
                      @if (Auth::user()->profile->avatar) 
                      <a href="#" class="display-picture">
                      <img src="{{asset('assets/uploads/profile/'.Auth::user()->profile->avatar)}}" style="width: 50px;" class="rounded-circle img-fluid" alt="avatar">
                      </a>
                      @else
                      <a href="#" class="display-picture"><img src="https://i.pravatar.cc/85" alt=""></a><!--Profile Image-->
                       
                    @endif
                        </ul>
                        <div class="profile-card hidden">
                          <ul>
                            <li><a style="color:white; !important" href="{{ route('profile.edit', Auth::user()->profile->id) }}">Manage Profile</li></a>
                            <li><a style="color:white; !important" href="{{ route('change.password', Auth::user()->id) }}">Change Password</li></a>
                            @if(Auth::user()->quizResults->count() > 0)
                                <li><a style="color: white !important;" href="{{ route('answered-quiz-history') }}">Quiz History</a></li>
                            @endif

                            <li><a style="color:white; !important" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                      document.getElementById('logout-form').submit();">Log Out</li></a>
                          </ul>
                          <!-- Logout Form -->
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                        </div>
                    </nav>
                    @endauth
                    <label class="theme-switch">
                <input type="checkbox" id="themeToggle" />
                <span class="slider round" style="display:none"></span>
                <i class="sun-icon fas fa-sun"></i>
                <i class="moon-icon fas fa-moon"></i>
              </label>
        </header>

    <script>
    // JavaScript to toggle between dark and light themes
    const themeStylesheet = document.getElementById('theme-stylesheet');
    const themeToggleButton = document.getElementById('themeToggle');

    
    // Check if the theme preference is stored in localStorage
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme) {
      themeStylesheet.setAttribute('href', storedTheme);
    }

    themeToggleButton.addEventListener('click', () => {
      if (themeStylesheet.getAttribute('href').endsWith('style.css')) {
        themeStylesheet.setAttribute('href', "{{ asset('assets/css/stylelight.css') }}");
        localStorage.setItem('theme', "{{ asset('assets/css/stylelight.css') }}");
      } else {
        themeStylesheet.setAttribute('href',  "{{ asset('assets/css/style.css') }}");
        localStorage.setItem('theme',  "{{ asset('assets/css/style.css') }}");
      }
    });
   
  </script>
  <script>
  let card = document.querySelector(".profile-card"); 
let displayPicture = document.querySelector(".display-picture"); 

displayPicture.addEventListener("click", function() { 
  console.log('clicked');
card.classList.toggle("hidden");})
  </script>

