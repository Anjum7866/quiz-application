<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile not-navigation-link">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{ asset('assets/images/faces/face8.jpg') }}" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name"> {{ Auth::user()->name }}</p>
                        <div class="dropdown" data-display="static">
                            <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" data-toggle="dropdown" aria-expanded="false">
                                <small class="designation text-muted">Admin</small>
                                <span class="status-indicator online"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                                <a class="dropdown-item p-0">
                                    <div class="d-flex border-bottom">
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                                        </div>
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                            <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                                        </div>
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item mt-2" href="{{ route('admin_users.index') }}"> Manage Accounts </a>
                                <a class="dropdown-item"> Change Password </a>
                                <a class="dropdown-item"> Sign Out </a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-block">New Quiz <i class="mdi mdi-plus"></i></button>
            </div>
        </li>
        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/home') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-table-large"></i>
        <span class="menu-title">Subjects</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/subjects') }}">View Subjects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/topics') }}">View All Topics</a>
          </li>
        </ul>
      </div>
    </li>
        <li class="nav-item ">
            <a class="nav-link"  href="{{ url('/quizzes') }}" aria-expanded="{{ request()->is('basic-ui/*') }}" aria-controls="basic-ui">
                <i class="menu-icon mdi mdi-dna"></i>
                <span class="menu-title">Quiz</span>
            </a>
        </li>
        <li class="nav-item">
    <a class="nav-link" href="{{ url('/questions') }}" aria-expanded="{{ request()->is('basic-ui/*') }}" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Question</span>
    </a>
</li>

       
       
       
    </ul>
</nav>
