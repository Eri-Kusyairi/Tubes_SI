<?php

namespace App\Http\Controllers;

use App\Models\TbKelas;
use App\Models\Daftar;
use App\Models\TbPengajar;
use App\Models\TbMapel;
use App\Models\JenisDiklat;
use App\Models\siswa;
use App\Models\diklat;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = TbKelas::all();
        $mapels = TbMapel::all();
        $instrukturs = TbPengajar::all();
        $diklats = Diklat::all();
        $daftars = Daftar::all();
        return view('jeniskelas', compact('kelass', 'daftars', 'mapels', 'diklats', 'instrukturs'));
    }

    public function create()
    {
        // Tampilkan form untuk membuat data kelas baru

    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh form
        $request->validate([
            'id_instruktur' => 'required',
            'id_mapel' => 'required',
            'id_jenisdiklat' => 'required',
            'Id_siswa' => 'required',
            'hari' => 'required',
            'jumlahjam' => 'required',
        ]);
        $kelass = new TbKelas();
        $kelass->id_instruktur = $request->input('id_instruktur');
        $kelass->id_mapel = $request->input('id_mapel');
        $kelass->id_jenisdiklat = $request->input('id_jenisdiklat');
        $kelass->Id_siswa = $request->input('Id_siswa');
        $kelass->hari = $request->input('hari');
        $kelass->jumlahjam = $request->input('jumlahjam');
        $kelass->save();

        return redirect('/Jeniskelas')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(TbKelas $kelas)
    {
        // Tampilkan detail data kelas
        return view('kelas.show', compact('kelas'));
    }

    public function edit(TbKelas $kelas)
    {
        // Tampilkan form untuk mengedit data kelas
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, TbKelas $kelas)
{
    // Validasi data yang dikirimkan oleh form
    $request->validate([
        'id_instruktur' => 'required',
        'id_mapel' => 'required',
        'id_jenisdiklat' => 'required',
        'Id_siswa' => 'required',
        'hari' => 'required',
        'jumlahjam' => 'required',
    ]);

    $kelas->id_instruktur = $request->input('id_instruktur');
    $kelas->id_mapel = $request->input('id_mapel');
    $kelas->id_jenisdiklat = $request->input('id_jenisdiklat');
    $kelas->Id_siswa = $request->input('Id_siswa');
    $kelas->hari = $request->input('hari');
    $kelas->jumlahjam = $request->input('jumlahjam');
    $kelas->save();

    return redirect('/Jeniskelas')->with('success', 'Kelas berhasil diperbarui.');
}


    public function destroy(TbKelas $kelas)
    {
        // Hapus data kelas dari database
        $kelas->delete();

        // Redirect ke halaman index kelas dengan pesan sukses
        return redirect('/Jeniskelas')->with('success', 'Kelas berhasil dihapus.');
    }
}
