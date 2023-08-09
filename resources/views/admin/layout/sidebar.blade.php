   
   
 <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">Tecnolynx</span>
      </div>
      <ul class="nav-links">
        <li>
        <a href="{{ url('/org/admin/dashboard') }}" class="{{ request()->is('org/admin/dashboard') ? 'active' : '' }}">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name">Dashboard</span>
        </a>
        </li>
       
        @if(in_array(Auth::user()->role, ['admin', 'superadmin','teacher']))
        <li>
          <a  href="{{ url('/org/subjects') }}" class="{{ request()->is('org/subjects') ? 'active' : '' }}">
            <i class="bx bx-box"></i>
            <span class="links_name">Subjects</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/org/topics') }}" class="{{ request()->is('org/topics') ? 'active' : '' }}">
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Topics</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/org/quizzes') }}" class="{{ request()->is('org/quizzes') ? 'active' : '' }}">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Quiz</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/org/questions') }}" class="{{ request()->is('org/questions') ? 'active' : '' }}">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Question</span>
          </a>
        </li>
        @endif
        @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
          <li>
            <a href="{{ url('/admin_users') }}" class="{{ request()->is('admin_users') ? 'active' : '' }}">
            <i class="bx bx-user"></i>
              <span class="links_name">Admin</span>
            </a>
          </li>
        @endif
        @if(Auth::user()->quizResults->count() > 0)
          <li>
          <a href="{{ route('org.answered-quiz-history') }}" class="{{ url()->current() == route('org.answered-quiz-history') ? 'active' : '' }}">
              <i class="bx bx-box"></i>
              <span class="links_name">Quiz History</span>
          </a>
          </li>
      @endif

        <li>
          <a  href="{{ route('adminprofile.edit', Auth::user()->profile->id) }}" class="{{ url()->current() == route('adminprofile.edit', Auth::user()->profile->id) ? 'active' : '' }}">
            <i class="bx bx-cog"></i>
            <span class="links_name" >Settings</span>
          </a>
        </li>
        <li class="log_out">
          <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="bx bx-log-out"></i>
            <span class="links_name" >Log out</span>
          </a>
        </li>
      </ul>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
    </div>