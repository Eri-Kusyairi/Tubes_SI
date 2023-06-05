<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Diklat</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/daftar.css') }}">
</head>
<body>
    <section class="registration">
        <div class="container">
            <h2 class="text-center">Pendaftaran Diklat</h2>
            <form method="POST" action="{{ route('daftar.store') }}">
                @csrf
                <div class="form-group">
                    <label for="jenis_diklat">Pilih Jenis Diklat:</label>
                    <select class="form-control" id="jenis_diklat" name="id_jenisdiklat" required>
                        @foreach ($diklats as $jenisdiklat)
                        <option value="{{ $jenisdiklat->id_jenisdiklat }}">{{ $jenisdiklat->namadiklat }}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="form-group">
                    <label for="Nama_siswa">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="Nama_siswa" name="Nama_siswa" placeholder="Masukkan nama lengkap Anda" required>
                </div>
                <div class="form-group">
                    <label for="periode_diklat">Pilih Periode Ujian Negara:</label>
                    <input type="date" class="form-control" id="periode_diklat" name="periode_diklat" required>
                </div> 
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email Anda" required>
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat:</label>
                    <textarea class="form-control" id="Alamat" name="Alamat" rows="3" placeholder="Masukkan alamat lengkap Anda" required></textarea>
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor Telepon:</label>
                    <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor telepon Anda" required>
                </div>
                <div class="form-group">
                    <label for="Gender">Jenis Kelamin:</label>
                    <select class="form-control" id="Gender" name="Gender" required>
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Namaortu">Nama Ortu:</label>
                    <input type="text" class="form-control" id="Namaortu" name="Namaortu" placeholder="Masukkan NIK Anda" required>
                </div>
                <div class="form-group">
                    <label for="Pekerjaanortu">Pekerjaan Ortu:</label>
                    <input type="text" class="form-control" id="Pekerjaanortu" name="Pekerjaanortu" placeholder="Masukkan pekerjaan Anda" required>
                </div>
                <div class="form-group">
                    <label for="Penghasilan">Penghasilan:</label>
                    <input type="text" class="form-control" id="Penghasilan" name="Penghasilan" placeholder="Masukkan penghasilan Anda" required>
                </div>
                <a href="{{ route('navbar.index') }}" class="btn btn-primary">Kirim</a>
                <a href="{{ route('navbar.index') }}" class="btn btn-primary">Back</a>
            </form>            
        </div>
    </section>    
    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>