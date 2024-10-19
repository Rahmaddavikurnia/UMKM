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
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('b.create')}}" class="btn btn-sm btn-neutral">Tambah</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Tabel UMKM</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nama Bisnis</th>
                    <th>Kategori</th>
                    <th>Provinsi</th>
                    <th>Kab/Kota</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Jam Buka</th>
                    <th>Media Sosial</th>
                  </tr>
                </thead>
                <tbody class="list">
                 
                    
                    @foreach ($bisniss as $bisnis)
                     <tr>
                    {{-- <th scope="row"> --}}
                    <td>{{$bisnis->id}}</td>
                    <td>{{$bisnis->nama_bisnis}}</td>
                    <td>{{$bisnis->categoris->categori_id}}</td>
                    <td>{{$bisnis->province->province_id}}</td>
                    <td>{{$bisnis->regency->regency_id}}</td>
                    <td>{{$bisnis->email}}</td>
                    <td>{{$bisnis->no_hp}}</td>
                    <td>{{$bisnis->jambuka}}</td>
                    <td>{{$bisnis->medsos}}</td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          {{-- <a class="dropdown-item" href="{{route('c.edit', $categori)}}" method="get">
                            @csrf
                            Ubah</a> --}}
                            <form class="dropdown-item" action="{{ route('b.update', $bisnis)}}" method="get">
                              @csrf
                              <button type="submit" class="btn btn-info" onclick="nowuiDashboard.showNotification('top','left')">Ubah</button>
                            </form>

                            <form class="dropdown-item" action="{{route('b.delete', $bisnis)}}" method="post">
                              @method('delete')
                               @csrf
                               <button type="submit" class="btn btn-danger" onclick="nowuiDashboard.showNotification('top','left')">Hapus</button>
                               {{-- <a href="{{route('c.delete', $categori)}}" method="post">
                           
                                Hapus
                              </a> --}}
                           </form>
                           
                        </div>
                      </div>
                    </td>
                  {{-- </th> --}}
                </tr>
                    @endforeach
                    
                  
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
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