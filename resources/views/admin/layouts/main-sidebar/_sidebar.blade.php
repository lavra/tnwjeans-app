  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('img/logo-tnwjeans-2.png')}}" alt="AdminLTE Logo" class="img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Site Admin</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      {{-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      --}}

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('slider1.index')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>Fotos Slider</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('lookbook.index')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>Fotos Lookbook</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('content.index')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Conteúdo</p>
            </a>
          </li>        
        </ul>
      </nav>
    </div>
  </aside>