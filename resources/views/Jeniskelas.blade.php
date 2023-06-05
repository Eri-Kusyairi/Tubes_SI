<!DOCTYPE html>
<html lang="en">

<head>
  <title>SI_Akademik_BBU</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">E-Twenty One</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  @include('sidebar')
  {{-- isi tabel --}}
  <main id="main" class="main">
  <div class="pagetitle">
    <h1>Jenis Kelas</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dasboard">Dasboard</a></li>
        <li class="breadcrumb-item active">Jenis Kelas</li>
      </ol>
    </nav>
  </div>
  <section class="section dashboard">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
                    <a href="{{ route('TbKelas.pdf') }}" class="btn btn-danger btn-sm"><i class="fas fa-print"></i> Ekspor Ke PDF</a>
                    <table id="jenisdiklatTable" class="table">
                        <thead>
                            <tr>
                                <th>id_kelas</th>
                                <th>id_instruktur</th>
                                <th>id_mapel</th>
                                <th>id_jenisdiklat</th>
                                <th>Id_siswa</th>
                                <th>hari</th>
                                <th>jumlahjam</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelass as $diklat)
                            <tr>
                                <td>{{ $diklat->id_kelas }}</td>
                                <td>{{ $diklat->id_instruktur }}</td>
                                <td>{{ $diklat->id_mapel }}</td>
                                <td>{{ $diklat->id_jenisdiklat }}</td>
                                <td>{{ $diklat->Id_siswa }}</td>
                                <td>{{ $diklat->hari }}</td>
                                <td>{{ $diklat->jumlahjam }}</td>
                                <td>

                                    <!-- Tombol Update -->
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $diklat->id_kelas }}">Update</a>

                                    <!-- Tombol Delete -->
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $diklat->id_kelas }}">Delete</a>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="confirmDelete{{ $diklat->id_kelas }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $diklat->id_kelas }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteLabel{{ $diklat->id_kelas }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('kelass.destroy', $diklat->id_kelas) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Update -->
                            <div class="modal fade" id="updateModal{{ $diklat->id_kelas }}" tabindex="-1"
                              aria-labelledby="updateModalLabel{{ $diklat->id_kelas }}" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title"
                                              id="updateModalLabel{{ $diklat->id_kelas }}">Update Data Jenis
                                              Kelas</h5>
                                          <button type="button" class="btn-close"
                                              data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <form
                                              action="{{ route('kelass.update', ['kelas' => $diklat->id_kelas]) }}"
                                              method="POST">
                                              @csrf
                                              @method('PUT')
                                                <label for="jenis_diklat">Jenis instruktur</label>
                                                <select class="form-control" id="id_instruktur" name="id_instruktur" required>
                                                    <option value="">Pilih Jenis Diklat</option>
                                                    @foreach ($instrukturs as $instruktur)
                                                    <option value="{{ $instruktur->id_instruktur }}">{{ $instruktur->id_instruktur }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="jenis_diklat">Jenis Mapel</label>
                                                <select class="form-control" id="id_mapel" name="id_mapel" required>
                                                    <option value="">Pilih Jenis Mapel</option>
                                                    @foreach ($mapels as $Mapel)
                                                    <option value="{{ $Mapel->id_mapel }}">{{ $Mapel->id_mapel }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="jenis_diklat">Jenis Diklat</label>
                                                <select class="form-control" id="id_jenisdiklat" name="id_jenisdiklat" required>
                                                    <option value="">Pilih Jenis Diklat</option>
                                                    @foreach ($daftars as $jenisdiklat)
                                                    <option value="{{ $jenisdiklat->id_jenisdiklat }}">{{ $jenisdiklat->id_jenisdiklat }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="jenis_diklat"> Id_siswa</label>
                                                <select class="form-control" id="Id_siswa" name="Id_siswa" required>
                                                    <option value="">Pilih Id_siswa</option>
                                                    @foreach ($daftars as $siswa)
                                                    <option value="{{ $siswa->Id_siswa }}">{{ $siswa->Id_siswa }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="mb-3">
                                                    <label for="hari" class="form-label">Hari</label>
                                                    <input type="text" class="form-control" id="hari" name="hari" value="{{ $diklat->hari }}" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlahJam" class="form-label">Jumlah Jam</label>
                                                    <input type="text" class="form-control" id="jumlahJam" name="jumlahjam" value="{{ $diklat->jumlahjam }}" />
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addModalLabel">Tambah Data Jenis Kelas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('kelass.store') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="id_instruktur">id_instruktur</label>
                    <select class="form-control" id="id_instruktur" name="id_instruktur">
                        <option value="">Pilih Id Instruktur</option>
                        @foreach ($instrukturs as $instruktur)
                            <option value="{{ $instruktur->id_instruktur }}">{{ $instruktur->id_instruktur }}</option>
                        @endforeach
                    </select>
                </div>                
                  <div class="mb-3">
                      <label for="Nama_Mapel">Jenis Mapel</label>
                      <select class="form-control" id="id_mapel" name="id_mapel" required>
                          <option value="">Pilih Jenis Diklat</option>
                          @foreach ($mapels as $mapel)
                              <option value="{{ $mapel->id_mapel }}">{{ $mapel->id_mapel }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="jenis_diklat">Jenis Diklat</label>
                    <select class="form-control" id="id_jenisdiklat" name="id_jenisdiklat" required>
                        <option value="">Pilih Jenis Diklat</option>
                        @foreach ($diklats as $jenisdiklat)
                        <option value="{{ $jenisdiklat->id_jenisdiklat }}">{{ $jenisdiklat->id_jenisdiklat }}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="mb-3">
                      <label for="Id_siswa">Id_siswa</label>
                      <select class="form-control" id="Id_siswa" name="Id_siswa" required>
                          <option value="">Pilih Jenis Diklat</option>
                          @foreach ($daftars as $siswa)
                              <option value="{{ $siswa->Id_siswa }}">{{ $siswa->Id_siswa }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="hari" class="form-label">Hari</label>
                      <input type="text" class="form-control" id="hari" name="hari" />
                  </div>
                  <div class="mb-3">
                      <label for="jumlahjam" class="form-label">Jumlah Jam</label>
                      <input type="text" class="form-control" id="jumlahjam" name="jumlahjam" />
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah</button>
              </form>
          </div>
      </div>
  </div>
</div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#jenisdiklatTable').DataTable();
    });
  </script>
  <script>
    $(document).ready( function () {
     $('#myTable').DataTable();
     } );
     $(document).ready(function() {
 $('#example').DataTable();
});
 </script>
 <script type="text/javascript">
  $(document).ready(function() {
      $('#myTable').DataTable();
  } );
</script>
</body>
</html>
