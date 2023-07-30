<!DOCTYPE html>
<html>
@include('head')
<body >
<div class="container-scroller" id="app">
    @include('navbar')
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
      @include('footer')
    </div>
  </div>
  <!-- base js -->

  </body>
</html>