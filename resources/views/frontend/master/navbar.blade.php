<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h2 class="text-primary"><i class="fas fa-search-dollar me-3"></i>UMKM</h2>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.html" class="nav-item nav-link">Beranda</a>
            <a href="about.html" class="nav-item nav-link">Tentang</a>
            @auth
                <a href="service.html" class="nav-item nav-link">Kategori</a>
                <a href="contact.html" class="nav-item nav-link">Usaha</a>
            @endauth
        </div>
        @if (auth()->check())
        <div class="dropdown me-5">
            {{-- <a class="btn btn-md-square btn-light rounded-circle me-2" data-bs-toggle="dropdown" href=""><i class="fa fa-user"></i></a> --}}
            <a href="#" class="" data-bs-toggle="dropdown"><i class="fa fa-user text-primary me-2"></i>{{ Auth::user()->name }}</a>
            <div class="dropdown-menu rounded">
                <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i>Profile</a>
                @if (!Auth::check() || Auth::user()->role != 'customer')
                    <a href="{{route('admin.dashboard')}}" class="dropdown-item"><i class="fas fa-cog me-2"></i>Admin</a>
                @endif
                <a href="{{route('logout')}}" class="dropdown-item"><i class="fas fa-power-off me-2"></i>Log Out</a>
            </div>
        </div>
        @else
            <a href="{{route('login')}}" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 me-3 flex-shrink-0">Login</a>
            <a href="#" class="btn btn-outline-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">Register</a>
        @endif
        
        
    </div>
</nav>