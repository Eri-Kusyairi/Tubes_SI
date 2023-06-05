<!DOCTYPE html>
<html>
    <head>
        <title>Jenis Diklat</title>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pFV4MRhU5hvcTrf/bW1s48jZ5dINh4M0a9+HTuQHzTVIcC77elJSYvc2W40rX6Fq" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
	<body>
	@include('sidebar')

        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Data Jenis Diklat</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Mapel">Dasboard</a></li>
                        <li class="breadcrumb-item active">Data Jenis Diklat</li>
                    </ol>
                </nav>
            </div>
            <section class="section dashboard">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
                                <a href="{{ route('jenisdiklat.pdf') }}" class="btn btn-danger btn-sm"><i class="fas fa-print"></i> Ekspor Ke PDF</a>
                                <table id="jenisdiklatTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID Jenis Diklat</th>
                                            <th>Nama Diklat</th>
                                            <th>Jumlah Hari</th>
                                            <th>Jumlah Jam</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($diklats as $diklat)
                                        <tr>
                                            <td>{{ $diklat->id_jenisdiklat }}</td>
                                            <td>{{ $diklat->namadiklat }}</td>
                                            <td>{{ $diklat->hari }}</td>
                                            <td>{{ $diklat->jumlahjam }}</td>
                                            <td>
                                                <!-- Tombol Update -->
                                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $diklat->id_jenisdiklat }}">Update</a>
        
                                                <!-- Tombol Delete -->
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $diklat->id_jenisdiklat }}">Delete</a>
        
                                                <!-- Modal Konfirmasi Hapus -->
                                                <div class="modal fade" id="confirmDelete{{ $diklat->id_jenisdiklat }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $diklat->id_jenisdiklat }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmDeleteLabel{{ $diklat->id_jenisdiklat }}">Konfirmasi Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('diklat.destroy', $diklat->id_jenisdiklat) }}" method="POST">
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
                                        <div class="modal fade" id="updateModal{{ $diklat->id_jenisdiklat }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $diklat->id_jenisdiklat }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel{{ $diklat->id_jenisdiklat }}">Update Data Jenis Diklat</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('diklat.update', $diklat->id_jenisdiklat) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="namaDiklat" class="form-label">Nama Diklat</label>
                                                                <input type="text" class="form-control" id="namaDiklat" name="namadiklat" value="{{ $diklat->namadiklat }}" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="hari" class="form-label">Jumlah Hari</label>
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
                        <h5 class="modal-title" id="addModalLabel">Tambah Data Jenis Diklat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('diklat.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="namaDiklat" class="form-label">Nama Diklat</label>
                                <input type="text" class="form-control" id="namaDiklat" name="namadiklat" />
                            </div>
                            <div class="mb-3">
                                <label for="hari" class="form-label">Jumlah Hari</label>
                                <input type="text" class="form-control" id="hari" name="hari" />
                            </div>
                            <div class="mb-3">
                                <label for="jumlahJam" class="form-label">Jumlah Jam</label>
                                <input type="text" class="form-control" id="jumlahJam" name="jumlahjam" />
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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