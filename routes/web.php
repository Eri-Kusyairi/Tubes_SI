<?php

use App\Http\Controllers\DaftarController;
use App\Http\Controllers\diklatController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\tbPenggunaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\absensiController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ExportController;
use App\Models\TbNilai;
use App\Models\absensi;
use App\Models\Daftar;
use App\Models\TbKelas;
use App\Models\Diklat;
use App\Models\TbMapel;
use App\Models\TbPegawai;
use App\Models\TbPengajar;
use App\Models\tbPengguna;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
Route::get('/dasboard', function () {
    return view('dasboard');
});

Route::get('/dassiswa', function () {
    return view('/dassiswa');
});

// Route::get('/Datapeserta', function () {
//     $daftars = Daftar::all();
//     return view('Datapeserta', compact('daftars'));
// });

Route::get('/Datapeserta', [DaftarController::class, 'index'])->name('daftars.index');;
Route::get('/Datapeserta/create', [DaftarController::class, 'create'])->name('daftars.create');;
Route::post('/Datapeserta', [DaftarController::class, 'store'])->name('daftars.store');;
Route::get('/Datapeserta/edit/{id_siswa}', [DaftarController::class, 'edit'])->name('daftars.edit');;
Route::put('/Datapeserta/update/{id_siswa}', [DaftarController::class, 'update'])->name('daftars.update');;
Route::delete('/Datapeserta/delete/{id_siswa}', [DaftarController::class, 'destroy'])->name('daftars.destroy');

Route::get('/Datapegawai', function () {
    $pegawai = TbPegawai::all();
    return view('Datapegawai', compact('pegawai'));
});
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/{pegawai}', [PegawaiController::class, 'show'])->name('pegawai.show');
Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

Route::get('/Datapengajar', function () {
    $instrukturs = TbPengajar::all();
    $diklats = Diklat::all();
    return view('Datapengajar', compact('instrukturs', 'diklats'));
})->name('Datapengajar');

Route::resource('instrukturs', InstrukturController::class);
Route::get('/instrukturs', [InstrukturController::class, 'index'])->name('instrukturs.index');
Route::get('/instrukturs/create', [InstrukturController::class, 'create'])->name('instrukturs.create');
Route::post('/instrukturs', [InstrukturController::class, 'store'])->name('instrukturs.store');
Route::get('/instrukturs/{id}/edit', [InstrukturController::class, 'edit'])->name('instrukturs.edit');
Route::put('/instrukturs/{id}', [InstrukturController::class, 'update'])->name('instrukturs.update');
Route::delete('/instrukturs/{id}', [InstrukturController::class, 'destroy'])->name('instrukturs.destroy');

Route::get('/Mapel', function () {
    $mapels = TbMapel::all();
    $diklats = Diklat::all();
    return view('Mapel', compact('mapels', 'diklats'));
})->name('Mapel');
Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
Route::get('/mapel/create', [MapelController::class, 'create'])->name('mapel.create');
Route::post('/mapel', [MapelController::class, 'store'])->name('mapel.store');
Route::get('/mapel/{mapel}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
Route::put('/mapel/{mapel}', [MapelController::class, 'update'])->name('mapel.update');
Route::delete('/mapel/{mapel}', [MapelController::class, 'destroy'])->name('mapel.destroy');


Route::get('/Jeniskelas', function () {
    $kelass = TbKelas::all();
    $mapels = TbMapel::all();
    $instrukturs = TbPengajar::all();
    $diklats = Diklat::all();
    $daftars = Daftar::all();
    return view('jeniskelas', compact('kelass', 'daftars', 'mapels', 'diklats', 'instrukturs'));
})->name('jeniskelas');
Route::get('/kelass', [KelasController::class, 'index'])->name('kelass.index');
Route::get('/kelass/create', [KelasController::class, 'create'])->name('kelass.create');
Route::post('/kelass', [KelasController::class, 'store'])->name('kelass.store');
Route::get('/kelass/{kelas}/edit', [KelasController::class, 'edit'])->name('kelass.edit');
Route::put('/kelass/{kelas}', [KelasController::class, 'update'])->name('kelass.update');
Route::delete('/kelass/{kelas}', [KelasController::class, 'destroy'])->name('kelass.destroy');


Route::get('/Dataabsensi', function () {
    $absensi = absensi::all();
    $kelass = TbKelas::all();
    $mapels = TbMapel::all();
    $diklats = Diklat::all();
    return view('Dataabsensi', compact('absensi', 'kelass', 'mapels', 'diklats'));
})->name('absensi.index');

Route::resource('absensi', InstrukturController::class);
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/{absensi}', [AbsensiController::class, 'show'])->name('absensi.show');
Route::get('/absensi/{absensi}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
Route::put('/absensi/{absensi}', [AbsensiController::class, 'update'])->name('absensi.update');
Route::delete('/absensi/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');


Route::get('/cetak-laporan', 'ReportController@cetakLaporan');


Route::get('/sou', function () {
    return view('/sou');
});
Route::get('/Sre1', function () {
    return view('/Sre1');
});
Route::get('/Sre2', function () {
    return view('/Sre2');
});
Route::get('/Gmdss', function () {
    return view('/Gmdss');
});
Route::get('/Cop', function () {
    return view('/Cop');
});
Route::get('/Nilaiujian', function () {
    return view('/Nilaiujian');
});
Route::get('/Nilaitryout', function () {
    return view('/Nilaitryout');
});



Route::get('/Nilaitugas', function () {
    $nilai = TbNilai::all();
    $mapels = TbMapel::all();
    $instrukturs = TbPengajar::all();
    return view('Nilaitugas', compact('nilai', 'mapels', 'instrukturs'));
})->name('nilaitugas');

Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
Route::get('/nilai/{Id_siswa}/{id_mapel}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/{Id_siswa}/{id_mapel}', [NilaiController::class, 'update'])->name('nilai.update');
Route::delete('/nilai/{Id_siswa}/{id_mapel}', [NilaiController::class, 'destroy'])->name('nilai.destroy');



Route::get('/navbar', function () {
    return view('navbar');
});



Route::get('/jenisdiklat', function () {
    $diklats = diklat::all();
    return view('jenisdiklat', compact('diklats'));

});
Route::get('/jenisdiklat', [diklatController::class, 'index'])->name('diklat.index');
Route::get('/jenisdiklat/create', [diklatController::class, 'create'])->name('diklat.create');
Route::post('/jenisdiklat', [diklatController::class, 'store'])->name('diklat.store');
Route::get('/jenisdiklat/{id}/edit', [diklatController::class, 'edit'])->name('diklat.edit');
Route::put('/jenisdiklat/{id}', [diklatController::class, 'update'])->name('diklat.update');
Route::delete('/jenisdiklat/{diklat}', [diklatController::class, 'destroy'])->name('diklat.destroy');


Route::get('/Login', function () {
    $pengguna = TbPengguna::all();
    return view('Login', compact('pengguna'));
});
Route::get('/tbPengguna', [TbPenggunaController::class, 'index'])->name('tbPengguna.index');
Route::get('/tbPengguna/create', [TbPenggunaController::class, 'create'])->name('tbPengguna.create');
Route::post('/tbPengguna', [TbPenggunaController::class, 'store'])->name('tbPengguna.store');
Route::get('/tbPengguna/{id}/edit', [TbPenggunaController::class, 'edit'])->name('tbPengguna.edit');
Route::put('/tbPengguna/{id}', [TbPenggunaController::class, 'update'])->name('tbPengguna.update');
Route::delete('/tbPengguna/{id}', [TbPenggunaController::class, 'destroy'])->name('tbPengguna.destroy');

Route::post('/login', [tbPenggunaController::class, 'login'])->name('tbPengguna.login');

Route::get('/Pendaftaran', function () {
    $diklats = Diklat::all();
    return view('Pendaftaran', compact('diklats'));
});
Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar.index');
Route::get('/daftar/create', [DaftarController::class, 'create'])->name('daftar.create');
Route::post('/daftar', [DaftarController::class, 'store'])->name('daftar.store');
Route::get('/daftar/{daftar}/edit', [DaftarController::class, 'edit'])->name('daftar.edit');
Route::put('/daftar/{daftar}', [DaftarController::class, 'update'])->name('daftar.update');
Route::delete('/daftar/{daftar}', [DaftarController::class, 'destroy'])->name('daftar.destroy');

Route::get('/soal', function () {
    return view('soal');
});

Route::get('/absensi-pdf', [ExportController::class, 'absensiPDF'])->name('absensi.pdf');
Route::get('/Daftar-pdf', [ExportController::class, 'DaftarPDF'])->name('Daftar.pdf');
Route::get('/TbKelas-pdf', [ExportController::class, 'TbKelasPDF'])->name('TbKelas.pdf');
Route::get('/pengajar-pdf', [ExportController::class, 'pengajarPDF'])->name('pengajar.pdf');
Route::get('/pegawais-pdf', [ExportController::class, 'pegawaiPDF'])->name('pegawais.pdf');
Route::get('/jenisdiklat-pdf', [ExportController::class, 'jenisdiklatPDF'])->name('jenisdiklat.pdf');
Route::get('/mapel-pdf', [ExportController::class, 'mapelPDF'])->name('mapel.pdf');
Route::get('/nilai-pdf', [ExportController::class, 'nilaiPDF'])->name('nilai.pdf');
// Route::get('/user-pdf', [ExportController::class, 'userPDF'])->name('user.pdf');
// Route::get('/outlet-pdf', [ExportController::class, 'outletPDF'])->name('outlet.pdf');
