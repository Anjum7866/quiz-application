<style>
 body.dark-theme {
  background-color: #1a1a1a;
  color: #ffffff;
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
    // Get the theme toggle checkbox and the body element
const themeToggle = document.getElementById("themeToggle");
const body = document.body;

// Check the user's preferred theme from localStorage (if available)
const currentTheme = localStorage.getItem("theme");
if (currentTheme) {
  body.classList.add(currentTheme);
}

// Add an event listener to the theme toggle
themeToggle.addEventListener("change", () => {
  if (body.classList.contains("dark-theme")) {
    body.classList.remove("dark-theme");
    localStorage.setItem("theme", "light-theme");
  } else {
    body.classList.add("dark-theme");
    localStorage.setItem("theme", "dark-theme");
  }
});

    </script>