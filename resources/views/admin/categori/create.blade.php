@include('admin.header')

<body>
  <!-- Sidenav -->
  @include('admin.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav --> 
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              {{-- <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav> --}}
            </div>
            {{-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        
          <div class="col-xl-9  order-xl-1">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Tambah Kategori</h3>
                  </div>
                 
                </div>
              </div>
              <div class="card-body">
                <form action="{{route('c.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Address -->
                  <h6 class="heading-small text-muted mb-4">Kategori UMKM</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-md-11">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Nama Kategori</label>
                          <input class="form-control" placeholder="Kategori" type="text" name="nama_categori" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-11">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Deskripsi</label>
                          <textarea rows="4" class="form-control" placeholder="masukkan deskripsi kategori" name="deskripsi"></textarea>

                        </div>
                      </div>
                    </div>

                    <div class="text-right mr-5 mt-5 mb-2">
                        <button type="submit" class="btn btn-info">kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <!-- Dark table -->
      <!-- Footer -->
      @include('admin.footer')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('admin.foot')
</body>

</html>