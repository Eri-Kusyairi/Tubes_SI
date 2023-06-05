<?php

namespace App\Http\Controllers;
use app\Models\diklat;
use app\Models\TbMapel;
use app\Models\TbKelas;
use App\Models\absensi;
use Illuminate\Http\Request;

class absensiController extends Controller
{
    public function index()
    {
    $absensi = absensi::all();
    $kelass = TbKelas::all();
    $mapels = TbMapel::all();
    $diklats = diklat::all();
    return view('Dataabsensi', compact('absensi','kelass', 'mapels', 'diklats'));
    }

    public function create()
    {
        // Tambahkan logika untuk menampilkan form create
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_jenisdiklat' => 'required',
            'Nama_siswa' => 'required',
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            'hari' => 'required',
            'keterangan' => 'required',
        ]);
        $absensi = new absensi();
        $absensi->id_jenisdiklat = $request->input('id_jenisdiklat');
        $absensi->Nama_siswa = $request->input('Nama_siswa');
        $absensi->id_kelas = $request->input('id_kelas');
        $absensi->id_mapel = $request->input('id_mapel');
        $absensi->hari = $request->input('hari');
        $absensi->keterangan = $request->input('keterangan');
        $absensi->save();

        return redirect('/Dataabsensi')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(absensi $absensi)
    {
        return view('absensi.show', compact('absensi'));
    }

    public function edit(absensi $absensi)
    {
        // Tambahkan logika untuk menampilkan form edit
    }

    public function update(Request $request, absensi $absensi)
{
    $this->validate($request, [
        'id_jenisdiklat' => 'required',
        'Nama_siswa' => 'required',
        'id_kelas' => 'required',
        'id_mapel' => 'required',
        'hari' => 'required',
        'keterangan' => 'required',
    ]);

    $absensi->id_jenisdiklat = $request->input('id_jenisdiklat');
    $absensi->Nama_siswa = $request->input('Nama_siswa');
    $absensi->id_kelas = $request->input('id_kelas');
    $absensi->id_mapel = $request->input('id_mapel');
    $absensi->hari = $request->input('hari');
    $absensi->keterangan = $request->input('keterangan');
    $absensi->save();

    return redirect('/Dataabsensi')->with('success', 'Data berhasil diperbarui');
}

public function destroy(absensi $absensi)
{
    $absensi->delete();

    return redirect('/Dataabsensi')->with('success', 'Absensi berhasil dihapus.');
}

}