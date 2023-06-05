<?php

namespace App\Http\Controllers;

use App\Models\TbPengajar;
use App\Models\TbMapel;
use App\Models\TbNilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = TbNilai::all();
        $mapels = TbMapel::all();
        $instrukturs = TbPengajar::all();
        return view('Nilaitugas', compact('nilai', 'mapels', 'instrukturs'));
    }

    public function create()
    {
        return view('nilai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_instruktur' => 'required',
            'id_mapel' => 'required',
            'nilai' => 'required',
        ]);

        TbNilai::create($request->all());

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil disimpan.');
    }

    public function edit($Id_siswa, $id_mapel)
{
    $nilai = TbNilai::where('Id_siswa', $Id_siswa)
        ->where('id_mapel', $id_mapel)
        ->first();

    return view('nilai.edit', compact('nilai'));
}

public function update(Request $request, $Id_siswa, $id_mapel)
{
    $request->validate([
        'id_instruktur' => 'required',
        'id_mapel' => 'required',
        'nilai' => 'required',
    ]);

    $nilai = TbNilai::where('Id_siswa', $Id_siswa)
        ->where('id_mapel', $id_mapel)
        ->first();

    $nilai->update($request->all());

    return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui.');
}

public function destroy($Id_siswa, $id_mapel)
{
    $nilai = TbNilai::where('Id_siswa', $Id_siswa)
        ->where('id_mapel', $id_mapel)
        ->first();

    $nilai->delete();

    return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus.');
}
}