<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="theme-stylesheet">
  <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />
  <style>
    :root{
      --violet:#6c5ce7;
      --pink:#FC427B;
      /* --gradient:linear-gradient(90deg, var(--violet), var(--pink)); */
      --gradient:linear-gradient(108deg,#46d3ff .14%,#6178ff 24.02%,#a750ff 39.05%,#ff1ec0 56.82%,#ff784b 77.82%,#ffce51 95.45%);
      --background: #333;
      --header-background: #222;
      --sidebar-background: #f2f2f2;
      --text-color: #fff;
      --header-text-color: #fff;
      --sidebar-text-color: #000;
    }

    *{
      font-family: 'Nunito', sans-serif;
      /* margin:0; padding:0; */
      box-sizing: border-box;
      outline: none; border:none;
      text-decoration: none;
      text-transform: capitalize;
      transition: all .2s ease-out;
    }

    /* Reset some default styles */
    body, html {
      font-size: 100%;
      margin: 0;
      padding: 0;
    }

    /* Fixed headers */
    .header {
      background-color: var(--header-background);
      color: var(--header-text-color);
      padding: 10px;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
      height:40px;
    }

    .sub-header {
      background: black;
      color: white;
      padding: 10px;
      position: fixed;
      top: 40px;
      left: 0;
      right: 0;
      z-index: 100;
    }

    /* Fixed sidebar */
    .sidebar {
      background-color: var(--sidebar-background);
      color: var(--sidebar-text-color);
      width: 200px;
      height: 100%;
      position: fixed;
      top: 80px;
      left: 0;
      bottom: 0;
      overflow-y: auto;
    }

    /* Mobile hamburger icon */
    .hamburger {
      display: none;
      cursor: pointer;
      position: fixed;
      top: 90px;
      left: 10px;
      z-index: 1000;
      color: black;

    }
    .close-button {
      display: none;
      position: absolute;
      top: 90px;
      right: 10px;
      cursor: pointer;
      color: black;
    }


    /* Main content */
    .content {
      margin-left: 220px;
      margin-top: 90px;
      padding: 20px;
      overflow-y: auto;
    }

    /* Card styles */
    .card {
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }
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

    /* Media query for mobile */
    @media screen and (max-width: 768px) {
      .sidebar {
        display: none;
      }

      .hamburger {
        display: block;
        color:white
      }

      .content {
        margin-left: 0;
      }

      .content, .sub-header {
        padding-left: 60px; /* To accommodate the width of the mobile sidebar */
      }

      .mobile-menu {
        display: none;
        position: fixed;
        top: 90px;
        left: 0;
        width: 200px;
        background-color: var(--sidebar-background);
        color: var(--sidebar-text-color);
        z-index: 999;
      }

      .mobile-menu.active {
        display: block;
      }
    }
  </style>
</head>
<body>
  
  <!-- Fixed headers -->
<div class="header" style="display:flex">
    <a href="#" class="logo">Tecnolynx<span>Global</span></a>

    <div id="menu" class="fas fa-bars"></div>

    <nav class="navbar" >
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
</div>
  <div class="sub-header" id="sub-header"> @foreach($subjects as $key => $subject)
  <span class="subject-name" data-subject-id="{{ $subject->id }}">{{ $subject->name }}</span>
    
@endforeach</div>

  <!-- Mobile hamburger icon -->
  <div class="hamburger" onclick="toggleMobileMenu()">&#9776;</div>
  
  <!-- Fixed sidebar -->
  <div class="sidebar" id="sidebar">
  
</div>

  <!-- Main content -->
  <div class="content">
    <!-- Data cards -->
    <div class="card">
      <h3>Card 1</h3>
      <p>Card content goes here.</p>
    </div>
    <div class="card">
      <h3>Card 2</h3>
      <p>Card content goes here.</p>
    </div>
    <!-- Add more cards here -->
    <!-- Large content to test scrolling -->
    <div style="height: 1000px; background-color: #f2f2f2;">
      <h3>Larger Content Area</h3>
      <p>This is a larger content area to test scrolling.</p>
    </div>
  </div>

  <!-- Mobile dropdown menu -->
  <div class="mobile-menu" id="mobileMenu">
      </div>
  <!-- <script>
    // Function to toggle the mobile menu
    function toggleMobileMenu() {
      var mobileMenu = document.getElementById('mobileMenu');
      mobileMenu.classList.toggle('active');
    }

    // Function to display topics based on the selected subject
    function displayTopics(subjectId) {
      var topicsContainer = document.getElementById('sidebar');
      topicsContainer.innerHTML = ''; // Clear existing topics

      // Find the selected subject in the subjects array
      var selectedSubject = @json($subjects->toArray()); // Convert PHP array to JavaScript array

      for (var i = 0; i < selectedSubject.length; i++) {
        if (selectedSubject[i].id == subjectId) {
          // Display topics if available
          if (selectedSubject[i].topics && selectedSubject[i].topics.length > 0) {
            selectedSubject[i].topics.forEach(function(topic) {
              topicsContainer.innerHTML += '<p>' + topic.name + '</p>';
            });
          } else {
            // Display "No topics found" message
            topicsContainer.innerHTML = '<p>No topics found</p>';
          }
          break;
        }
      }
    }

    // Function to handle subject name click event
    var subjectNames = document.querySelectorAll('.subject-name');
    console.log(subjectNames);
    var defaultSubjectId = @json($subjects->isEmpty() ? null : $subjects->first()->id); // Default subject ID

    subjectNames.forEach(function(subjectName) {
      subjectName.addEventListener('click', function() {
        var subjectId = this.dataset.subjectId;
        displayTopics(subjectId);
      });
    });

    // Show topics of the latest subject on page load/refresh
    if (defaultSubjectId) {
      displayTopics(defaultSubjectId);
    }
  </script> -->
  <!-- <script>
    function toggleMobileMenu() {
      var mobileMenu = document.getElementById('mobileMenu');
      mobileMenu.classList.toggle('active');
    }
    // Function to handle subject name click event
    var subjectNames = document.querySelectorAll('.subject-name');
    subjectNames.forEach(function(subjectName) {
      subjectName.addEventListener('click', function() {
        var subjectId = this.dataset.subjectId;
        var topicsContainer = document.getElementById('sidebar');
        topicsContainer.innerHTML = ''; // Clear existing topics
        
        // Filter and display topics based on the selected subject
        @foreach($subjects as $subject)
          if ("{{ $subject->id }}" === subjectId) {
            @foreach($subject->topics as $topic)
              topicsContainer.innerHTML += '<p>{{ $topic->name }}</p>';
            @endforeach
          }
        @endforeach
         // Find the selected subject in the subjects array
         var selectedSubject = @json($subjects->toArray()) // Convert PHP array to JavaScript array

        for (var i = 0; i < selectedSubject.length; i++) {
        if (selectedSubject[i].id == subjectId) {
            // Display topics if available
            if (selectedSubject[i].topics.length > 0) {
            selectedSubject[i].topics.forEach(function(topic) {
                topicsContainer.innerHTML += '<p>' + topic.name + '</p>';
            });
            } else {
            // Display "No topics found" message
            topicsContainer.innerHTML = '<p>No topics found</p>';
            }
            break;
        }
        }

      });/
    });
    var defaultSubjectId = @json($subjects->isEmpty() ? null : $subjects->first()->id); // Default subject ID
    console.log('defaultSubjectId',defaultSubjectId);
    if (defaultSubjectId) {
      displayTopics(defaultSubjectId);
    }
    else{
        topicsContainer.innerHTML = '<p>No topics found</p>';
    }
  </script>
  -->
  <script>
    function toggleMobileMenu() {
      var mobileMenu = document.getElementById('mobileMenu');
      mobileMenu.classList.toggle('active');
    }
    
    // Function to handle subject name click event
    var subjectNames = document.querySelectorAll('.subject-name');
    subjectNames.forEach(function(subjectName) {
      subjectName.addEventListener('click', function() {
        var subjectId = this.dataset.subjectId;
        var topicsContainer = document.getElementById('sidebar');
        topicsContainer.innerHTML = ''; // Clear existing topics

        // Filter and display topics based on the selected subject
        @foreach($subjects as $subject)
          if ("{{ $subject->id }}" === subjectId) {
            @foreach($subject->topics as $topic)
              topicsContainer.innerHTML += '<p>{{ $topic->name }}</p>';
            @endforeach
          }
        @endforeach
         // Find the selected subject in the subjects array
         var selectedSubject = @json($subjects->toArray()) // Convert PHP array to JavaScript array

        for (var i = 0; i < selectedSubject.length; i++) {
        if (selectedSubject[i].id == subjectId) {
            // Display topics if available
            if (selectedSubject[i].topics.length > 0) {
            selectedSubject[i].topics.forEach(function(topic) {
                topicsContainer.innerHTML += '<p>' + topic.name + '</p>';
            });
            } else {
            // Display "No topics found" message
            topicsContainer.innerHTML = '<p>No topics found</p>';
            }
            break;
        }
        }
            });
            });
  </script>
  
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

</body>
</html>
