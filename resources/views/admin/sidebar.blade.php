<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('argon-dashboard-bs4-main')}}/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('c.tabel')}}">
                <i class="ni ni-tag text-yellow"></i>
                <span class="nav-link-text">Kategori</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('b.tabel')}}">
                <i class="ni ni-money-coins text-default"></i>
                <span class="nav-link-text">Usaha</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="tables.html">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Tables</span>
              </a>
            </li>
          <!-- Navigation -->
        </div>
      </div>
    </div>
  </nav>