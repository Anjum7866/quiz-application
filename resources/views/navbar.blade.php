
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

</header>

