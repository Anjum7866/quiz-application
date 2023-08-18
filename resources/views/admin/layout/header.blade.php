<nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="page-title">Dashboard</span>

        </div>
        <div class="search-box">
            <form id="search-form" method="POST">
                  @csrf 
                  <input type="text" id="search-input" name="query" placeholder="Search..." />
              <button type="submit"><i class="bx bx-search"></i></button>
          </form>
          <div style="background: white; font-size: medium; padding: 10px;display: none;"  id="suggestions-container"></div>
        </div>
        <div class="profile-details">
          @if (Auth::user() && Auth::user()->profile && Auth::user()->profile->avatar)
          <img src="{{ asset('assets/uploads/profile/' . Auth::user()->profile->avatar) }}" alt="User Avatar" />
           @else
          <img src="{{ asset('/images/profile.jpg') }}" alt="Default Avatar" />
          @endif
          <div class="dropdown">
            <span class="admin_name">{{ Auth::user()->name }}</span>
        

            <i class="bx bx-chevron-down"></i>
            <div class="dropdown-content">
              @if(Auth::user()->profile)
              <a  href="{{ route('adminprofile.edit', Auth::user()->profile->id) }}">Manage Accounts</a>
              @endif
              <a href="{{ route('adminchange.password', Auth::user()->id) }}">Change Password</a>
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
      <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="searchModalLabel">Search Results</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Search results will be displayed here -->
            </div>
        </div>
    </div>
</div>

  <script>
    function setPageTitle(title) {
        const pageTitleElement = document.querySelector(".page-title");
        if (pageTitleElement) {
          pageTitleElement.textContent = title;
        }
      }
    setPageTitle(document.title);
  </script>
  <script>
    const searchInput = document.getElementById('search-input');
  const suggestionsContainer = document.getElementById('suggestions-container');

  searchInput.addEventListener('input', () => {
    const query = searchInput.value;

    if (query.length >= 2) {
        fetchSuggestions(query);
    } else {
        clearSuggestions();
    }
  });

function fetchSuggestions(query) {
   fetch(`/api/suggestions?query=${query}`)
      .then(response => response.json())
      .then(data => displaySuggestions(data.suggestions))
      .catch(error => console.error(error));
}

function displaySuggestions(suggestions) {
   suggestionsContainer.innerHTML = '';

   suggestions.forEach(suggestion => {
      const suggestionElement = document.createElement('div');
      suggestionElement.textContent = suggestion;
      suggestionElement.addEventListener('click', () => {
         searchInput.value = suggestion;
         clearSuggestions();
      });
      suggestionsContainer.appendChild(suggestionElement);
   });
   suggestionsContainer.style.display = 'block';

}

function clearSuggestions() {
   suggestionsContainer.innerHTML = '';
   suggestionsContainer.style.display = 'none';

}

</script>
<script>
$(document).ready(function() {
    $('#search-form').submit(function(e) {
      console.log('testing');
        e.preventDefault();
        
        var formData = $(this).serialize();
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
        $.ajax({
            type: 'POST',
            url: '{{ route('search.submit') }}',
            data: formData,
            success: function(response) {
                // Update the modal's content with the search results HTML
                $('#searchModal .modal-body').html(response);
                
                // Open the modal
                $('#searchModal').modal('show');
            }
        });
    });
});


  </script>
