<nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="page-title">Dashboard</span>

          <!-- <span class="dashboard">Dashboard</span> -->
        </div>
        <div class="search-box">
          <input type="text" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <img src="{{asset('assets/uploads/profile/'.Auth::user()->profile->avatar)}}" alt="" />
          <div class="dropdown">
            <span class="admin_name">{{ Auth::user()->name }}</span>
        

            <i class="bx bx-chevron-down"></i>
            <div class="dropdown-content">
              <a  href="{{ route('profile.edit', Auth::user()->id) }}">Manage Accounts</a>
              <a href="{{ route('change.password', Auth::user()->id) }}">Change Password</a>
              <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
            </div>
          </div>
        </div>

      </nav>
      <script>
    function setPageTitle(title) {
      const pageTitleElement = document.querySelector(".page-title");
      if (pageTitleElement) {
        pageTitleElement.textContent = title;
      }
    }
  setPageTitle(document.title);
  </script>
