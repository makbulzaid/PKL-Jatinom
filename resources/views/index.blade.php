<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('layout.navbar')
      
      @include('layout.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('judul')</h1>
          </div>
          <div class="section-body"></div>
        </section>
        @yield('content')
      </div>
      @include('layout.footer')
    </div>
  </div>

  @include('modal.logout')

@include('layout.script')
</body>
</html>