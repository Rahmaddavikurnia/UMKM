@include('admin.header')

<body>
  <!-- Sidenav -->
  @include('admin.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
   @include('admin.navbar')
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
                <form action="{{route('b.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Address -->
                  <h6 class="heading-small text-muted mb-4">Informasi Usaha</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Nama Bisnis</label>
                          <input type="text" class="form-control" name="nama_bisnis">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Kategori</label>
                          <input type="text" class="form-control" name="categori_id">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Foto Produk</label>
                          <input type="file" name="foto_produk" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Foto Usaha</label>
                          <input type="file" name="foto_bisnis" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Deskripsi</label>
                          <textarea class="form-control" name="deskripsi" cols="20" rows="8"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4" />
                  <!-- Address -->
                  <h6 class="heading-small text-muted mb-4">Lokasi Usaha</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label" for="province">Provinsi</label>
                          <select class="form-control" name="province_id" id="province">
                            <option value="">Pilih Provinsi</option>
                            <!-- Provinsi akan dimuat di sini -->
                        </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" >Kabupaten/Kota</label>
                          <select class="form-control" name="regenci_id" id="regency" disabled>
                            <option value="">Pilih Kabupaten/Kota</option>
                            <!-- Kabupaten/Kota akan dimuat di sini -->
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Garis Lintang</label>
                          <input name="latitude" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" >Garis Bujur</label>
                          <input type="text" name="longitude" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">No Telepon</label>
                          <input type="number" name="no_hp" class="form-control" >
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Jam Buka Usaha</label>
                          <input type="text" class="form-control" name="jambuka">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4" />
                  <!-- Description -->
                  <h6 class="heading-small text-muted mb-4">Informasi Kontak</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Email</label>
                          <input name="email" class="form-control" type="email">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" >Media Sosial</label>
                          <input type="text" name="medsos" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">No Telepon</label>
                          <input type="number" name="no_hp" class="form-control" >
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Jam Buka Usaha</label>
                          <input type="text" class="form-control" name="jambuka">
                        </div>
                      </div>
                    </div>
                    <div class="text-right mr-5 mt-5 mb-2">
                      {{-- <button type="submit" class="btn btn-info">kembali</button> --}}
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

  <script>
    $(document).ready(function() {
        // Load provinces on page load
        $.ajax({
            url: '/api/provinces',
            type: 'GET',
            success: function(response) {
                let provinces = response.data;
                $.each(provinces, function(key, province) {
                    $('#province').append(`<option value="${province.province_id}">${province.name}</option>`);
                });
            }
        });

        // Load regencies when a province is selected
        $('#province').on('change', function() {
            let provinceId = $(this).val();
            if (provinceId) {
                $('#regency').prop('disabled', false).empty().append('<option value="">Pilih Kabupaten/Kota</option>');
                $('#district').prop('disabled', true).empty().append('<option value="">Pilih Kecamatan</option>');
                
                $.ajax({
                    url: `/api/regencies/${provinceId}`,
                    type: 'GET',
                    success: function(response) {
                        let regencies = response.data;
                        $.each(regencies, function(key, regency) {
                            $('#regency').append(`<option value="${regency.regency_id}">${regency.name}</option>`);
                        });
                    }
                });
            } else {
                $('#regency').prop('disabled', true).empty().append('<option value="">Pilih Kabupaten/Kota</option>');
                $('#district').prop('disabled', true).empty().append('<option value="">Pilih Kecamatan</option>');
            }
        });

        // Load districts when a regency is selected
    });
</script>
</body>

</html>