<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <i class="bi-back"></i>
            <span>UMKM</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_1">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">Daftar Usaha</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Cara Kerja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Kontak</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="topics-listing.html">Topics Listing</a></li>

                        <li><a class="dropdown-item" href="contact.html">Contact Form</a></li>
                    </ul>
                </li>
            </ul>

            {{-- <div class="d-none d-lg-block "> --}}
                {{-- <a href="#top" class="navbar-icon bi-person smoothscroll"></a> --}}
                    <div class="nav-item dropdown">
                      {{-- <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
                            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                      {{-- </a> --}}
                      <div class="dropdown-menu">
                        <a href="#!" class="dropdown-item">
                          <i class="ni ni-single-02"></i>
                          <span>My profile</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                          <i class="ni ni-settings-gear-65"></i>
                          <span>Settings</span>
                        </a>
                        @auth
                        <a href="{{route('logout')}}" class="dropdown-item">
                          <form id="logout-form" action="{{route('logout')}}" method="POST">
                            @csrf
                            {{-- <button type="submit" class="btn btn-white btn-outline-white">Logout</button> --}}
                          
                          <i class="ni ni-user-run"></i>
                          <span>Logout</span>
                        </form>
                        </a>
                        @endauth
                       
                      </div>
                    </div2>
            {{-- </div> --}}
        </div>
    </div>
</nav>
