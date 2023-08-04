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
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                            

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                
                        @endif
       
                    </nav>
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
