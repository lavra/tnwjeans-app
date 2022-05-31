  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('slider1.index')}}" class="nav-link">Slider</a>
      </li>        
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('lookbook.index')}}" class="nav-link">Lookbook</a>
      </li> 
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      {{-- @include('admin.layouts.top-nav.search') --}}

      {{-- @include('admin.layouts.top-nav.messages') --}}

      {{-- @include('admin.layouts.top-nav.notifications') --}}

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      {{--
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      --}}
    </ul>
  </nav>
  <!-- /.navbar -->