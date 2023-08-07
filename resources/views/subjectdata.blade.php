<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  
  <title>User Dashboard</title>
  <script src="{{ asset('assets/js/script.js') }}" ></script>
 
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="theme-stylesheet">
  <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

    body, html {
      font-size: 100%;
      margin: 0;
      padding: 0;
      background-color: var(--background);
    }

    .header {
      background-color:#000;
      color:  var(--header-text-color);
      padding: 10px;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
      height:70px;
      justify-content: space-between;
      padding: 1rem 6%;
    }
    img.image{
      width:500px;
      height:350px;
    }
    .hamburger {
      display: none;
      cursor: pointer;
    }
    @media (max-width: 768px){
      .sub-header.hidden {
  display: none;
}


      .hamburger {
        display: block;
      }
      img.image{
        width: 100%;
        height: 100%;
    }
        .navbar {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background: #fff;
  border-top: .1rem solid rgba(0,0,0,.2);
  border-bottom: .1rem solid rgba(0,0,0,.2);
  clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
} 
.navbar.active {
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
  background: black;
}
.sub-header {
}
#menu {
  font-size: 1.5rem;
  }
    }
  
    .logo {
  font-size: 2.0rem;
  color: var(--violet);
  font-weight: bold;
}
 .logo span {
  color: var(--pink);
}
.navbar a {
    font-weight:normal;
  /* margin-left: 2rem; */
  font-size: 1.3rem;
  color: #fff !important;
}
.navbar.active a {
    font-weight:normal;
  /* margin-left: 2rem; */
  font-size: 1.3rem;
  color: #fff !important;
  display:block;
  text-align: center;
margin: 10px;
}
 .sub-header a {
    font-weight:normal;
  /* margin-left: 2rem; */
  font-size: medium;
  font-weight:bold;
  color: #fff !important;
}
    .sub-header {
      background: var(--violet);
      color: white;
      padding: 10px;
      position: fixed;
      top: 70px;
      left: 0;
      right: 0;
      z-index: 100;
    }

    .sidebar {
      /* background-color: var(--sidebar-background); */
      background-color:white;
      color: var(--sidebar-text-color);
      width: 200px;
      height: 100%;
      position: fixed;
      top: 110px;
      left: 0;
      bottom: 0;
      /* overflow-y: auto; */
      overflow-y: scroll;
      padding: 10px;

    }

    .hamburger {
      display: none;
      cursor: pointer;
      position: fixed;
      top: 100px;
      left: 10px;
      z-index: 1000;
      color: black;

    }
    .close-button {
      display: none;
      position: absolute;
      top: 100px;
      right: 10px;
      cursor: pointer;
      color: black;
    }


    .content {
      margin-left: 220px;
      margin-top: 110px;
      padding: 20px;
      overflow-y: auto;
    }

    .card {
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      width: 80%;
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

        .theme-switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
        }
        a{
            font-weight: bold;
        font-size: 18px;
        margin: 5px;
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

        .slider.round {
        border-radius: 20px;
        }

        .slider.round:before {
        border-radius: 50%;
        }

        .sun-icon,
        .moon-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        }

        .sun-icon {
        left: 3px;
        color: #f1c40f;
        }

        .moon-icon {
        right: 3px;
        color: #95a5a6; 
        }

        body.dark-theme .sun-icon {
        display: none;
        }

        body:not(.dark-theme) .moon-icon {
        display: none;
        }
        .mobile-menu {
        display: none;
        }


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
        margin-top: 150px;
      }

      .content, .sub-header {
        padding-left: 60px; 
      }

      .mobile-menu {
        display: none;
        position: fixed;
        top: 140px;
        left: 0;
        width: 200px;
        background-color: var(--sidebar-background);
        color: var(--sidebar-text-color);
        z-index: 999;
        padding: 10px;
border-radius: 5px;
      }

      .mobile-menu.active {
        display: block;
      }
    }
  </style>
</head>
<body>
  
  <div class="header" style="display:flex">
      <a href="#" class="logo">Tecnolynx<span>Global</span></a>
      <div id="menu" class="fas fa-bars"></div>
      <nav class="navbar"  style="margin:auto">
              <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
              <a href="{{ url('/allsubjects')}}">Subjects</a>
              <a href="{{ url('/teacher')}}">teacher</a>
              <a href="{{ url('/price')}}">price</a>
              <a href="{{ url('/review') }}">review</a>
              <a href="{{ url('/contact') }}">contact</a>  
      </nav>
  </div>
  <div class="sub-header" id="sub-header"> 
  
    @foreach($subjects as $key => $subject)
    <a class="subject-name" data-subject-id="{{ $subject->id }}" href="{{url('/', $subject->id)}}">{{ $subject->name }}</a>
      
    @endforeach</div>

    <div class="hamburger"  onclick="toggleMobileMenu()">&#9776;</div>
    
    <div class="sidebar" id="sidebar">
      @if($singlesubject)
        @if($singlesubject->topics->count() > 0)
            @foreach($singlesubject->topics as $topic)
                <p class="topic" data-topic-id="{{ $topic->id }}">&bull; {{ $topic->name }}</p>
            @endforeach
            @foreach($singlesubject->quizzes as $quiz)
            <br> Take Subject Quiz By clicking link below<br/>
            <a href='#' data-quiz-id="{{ $quiz->id }}">{{ $quiz->title }}</a><br><br>
            @endforeach
        @else
            <p>No topics found for subject</p>
        @endif
      @else
        @foreach($subjects as $subject)
            @if($subject->topics->count() > 0)
                <h2>{{ $subject->name }}</h2>
                @foreach($subject->topics as $topic)
                    <p class="topic" data-topic-id="{{ $topic->id }}"><strong>{{ $topic->name }}</strong></p>
                @endforeach
                @foreach($subject->quizzes as $quiz)
                    <br> Take Subject Quiz By clicking link below<br/>
                    <a href='#' data-quiz-id="{{ $quiz->id }}">{{ $quiz->title }}</a><br><br>
            @endforeach
            @endif
        @endforeach
      @endif
    </div> 
 
    <div class="content" >
      <div class="card" id="topicContent">
      @if ($singlesubject && $singlesubject->count() > 0)
      <div class="subject">
        <h4>{{ $singlesubject->name }}</h4>
        <p>{{ $singlesubject->detail }}</p>
        <img class="image" src="{{asset('assets/uploads/profile/'.$singlesubject->image_path)}}" alt="" >
        <div class="topics">
          @foreach($singlesubject->topics as $topic)
            <strong>{{ $topic->name }}</strong>
            <p>{{ $topic->description }}</p>
            <img class="image" src="{{asset('assets/uploads/profile/'.$topic->content)}}" alt="" >
            <br><br>
            @foreach($topic->quizzes as $quiz)
            <br> Take Quiz By clicking link below<br/>
                <a href='#' data-quiz-id="{{ $quiz->id }}">{{ $quiz->title }}</a><br><br>
            @endforeach

          @endforeach
       </div>
      </div>
      @endif
    </div>
    <div id="resultContent" style="display: none;">...</div>

  </div>

  <div class="mobile-menu" id="mobileMenu">
     @if($singlesubject)
        @if($singlesubject->topics->count() > 0)
            @foreach($singlesubject->topics as $topic)
                <p class="topic" data-topic-id="{{ $topic->id }}">{{ $topic->name }}</p>
            @endforeach
            @foreach($singlesubject->quizzes as $quiz)
            <br> Take Subject Quiz By clicking link below<br/>
            <a href='#' data-quiz-id="{{ $quiz->id }}">{{ $quiz->title }}</a><br><br>
            @endforeach
        @else
            <p>No topics found for subject</p>
        @endif
      @else
        @foreach($subjects as $subject)
            @if($subject->topics->count() > 0)
                <h2>{{ $subject->name }}</h2>
                @foreach($subject->topics as $topic)
                    <p class="topic" data-topic-id="{{ $topic->id }}">{{ $topic->name }}</p>
                @endforeach
                @foreach($subject->quizzes as $quiz)
                    <br> Take Subject Quiz By clicking link below<br/>
                    <a href='#' data-quiz-id="{{ $quiz->id }}">{{ $quiz->title }}</a><br><br>
            @endforeach
            @endif
        @endforeach
      @endif
    <!-- Add more mobile menu items here -->
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  
$(document).ready(function () {
    $('.topic').click(function () {
        var topicId = $(this).data('topic-id');
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
     $.ajax({
            type: 'GET',
            url: '/get-topic-details/' + topicId, 
            success: function (data) {
                $('#topicContent').html(data);
                addQuizLinks();
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
     addQuizLinks();
    

    function addQuizLinks() {
        var quizLinks = $('#topicContent').find('a[data-quiz-id]');
        quizLinks.click(function (event) {
            event.preventDefault(); 
            var quizId = $(this).data('quiz-id');
            $.ajax({
                type: 'GET',
                url: '/check-login',
                    success: function (isLoggedIn) {
                        if (isLoggedIn) {
                            loadQuiz(quizId);
                        } else {
                                window.location.href = '/user-login';
                        }
                    },
                error: function (xhr, status, error) {
                        console.error(error);
                    }
            });
        });
    
        var subquizLinks = $('#sidebar').find('a[data-quiz-id]');
        subquizLinks.click(function (event) {
        event.preventDefault(); 
        var quizId = $(this).data('quiz-id');
        $.ajax({
            type: 'GET',
            url: '/check-login',
            success: function (isLoggedIn) {
                if (isLoggedIn) {
                    loadQuiz(quizId);
                } else {
                    window.location.href = '/user-login'; 
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
        });
        var submobquizLinks = $('#mobileMenu').find('a[data-quiz-id]');
        submobquizLinks.click(function (event) {
        event.preventDefault(); 
        var quizId = $(this).data('quiz-id');
        $.ajax({
            type: 'GET',
            url: '/check-login',
            success: function (isLoggedIn) {
                if (isLoggedIn) {
                    loadQuiz(quizId);
                } else {
                    window.location.href = '/user-login'; 
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
        });
        
        // var tryagainLinks = $('#quizResult').find('a[data-quiz-id]');
        // tryagainLinks.click(function (event) {
        //     console.log('tryagainLinks');
        // event.preventDefault(); 
        // var quizId = $(this).data('quiz-id');
        // $.ajax({
        //     type: 'GET',
        //     url: '/check-login',
        //     success: function (isLoggedIn) {
        //         if (isLoggedIn) {
        //             loadQuiz(quizId);
        //         } else {
        //             window.location.href = '/user-login'; 
        //         }
        //     },
        //     error: function (xhr, status, error) {
        //         console.error(error);
        //     }
        // });
        // });

        function loadQuiz(quizId) {
        $.ajax({
            type: 'GET', 
            url: '/quiz/' + quizId,
            success: function (data) {
                $('#topicContent').html(data);
                $('#submitQuizButton').on('click', function() {
                    var quizId = $(this).data('quiz-id'); // Get quizId from data attribute
                submitQuiz(quizId);
            });

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
        }

        function submitQuiz(quizId) {
            var formdata = $('#quizForm').serialize();
            $.ajax({
            type: 'POST',
            url: '/' + quizId,
            data: formdata,
            success: function(data) {
                $('#topicContent').html(data);
                $('#quizResult a[data-quiz-id]').on('click', function(event) {         
                event.preventDefault();
                var quizId = $(this).data('quiz-id');
                loadQuiz(quizId);
                })
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
            });
        }
    }
});
</script>
  
  
<script>
    const menuIcon = document.getElementById('menu');
  const subHeader = document.getElementById('sub-header');

  menuIcon.addEventListener('click', () => {
    subHeader.classList.toggle('hidden');
  });

    
    function toggleMobileMenu() {
      var mobileMenu = document.getElementById('mobileMenu');
      mobileMenu.classList.toggle('active');
    }

    const hamburgerIcons = document.querySelectorAll('.hamburger');
    hamburgerIcons.forEach(icon => {
      icon.addEventListener('click', () => {
      });
    });

    const themeStylesheet = document.getElementById('theme-stylesheet');
    const themeToggleButton = document.getElementById('themeToggle');

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
  document.addEventListener('DOMContentLoaded', function() {
  let menu = document.querySelector('#menu');
  let navbar = document.querySelector('.navbar');

  menu.onclick = () => {
    console.log('menu')
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
  }

  window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
  }
  
  });
</script>
</body>
</html>
