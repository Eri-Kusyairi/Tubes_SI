<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        $daftars = Daftar::all();
        return view('/Datapeserta', compact('daftars'));
    }
    public function store(Request $request)
    {
        // Validasi data yang diinputkan
        $this->validate($request, [
            'Nama_siswa' => 'required',
            'periode_diklat' => 'required',
            'email' => 'required|email',
            'Alamat' => 'required',
            'no_hp' => 'required',
            'Gender' => 'required',
            'Namaortu' => 'required',
            'Pekerjaanortu' => 'required',
            'Penghasilan' => 'required',
            'id_jenisdiklat' => 'required',
        ]);

        $daftar = [
            'Nama_siswa' => $request->input('Nama_siswa'),
            'periode_diklat' => $request->input('periode_diklat'),
            'email' => $request->input('email'),
            'Alamat' => $request->input('Alamat'),
            'no_hp' => $request->input('no_hp'),
            'Gender' => $request->input('Gender'),
            'Namaortu' => $request->input('Namaortu'),
            'Pekerjaanortu' => $request->input('Pekerjaanortu'),
            'Penghasilan' => $request->input('Penghasilan'),
            'id_jenisdiklat' => $request->input('id_jenisdiklat'),
        ];
        $daftar = Daftar::create($daftar);

        return redirect('/Datapeserta')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($Id_siswa)
{
    $daftar = Daftar::findOrFail($Id_siswa);
    return view('Datapeserta', compact('daftar'));
}

public function update(Request $request, $Id_siswa)
{
    $validatedData = $request->validate([
        'Nama_siswa' => 'required',
        'periode_diklat' => 'required',
        'email' => 'required|email',
        'Alamat' => 'required',
        'no_hp' => 'required',
        'Gender' => 'required',
        'Namaortu' => 'required',
        'Pekerjaanortu' => 'required',
        'Penghasilan' => 'required',
        'id_jenisdiklat' => 'required',
    ]);

    $daftar = Daftar::findOrFail($Id_siswa);
    $daftar->update($validatedData);

    return redirect('/daftar')->with('success', 'Data berhasil diperbarui');
}

public function destroy($Id_siswa)
{
    $daftar = Daftar::findOrFail($Id_siswa);
    $daftar->delete();

    return redirect('/daftar')->with('success', 'Data berhasil dihapus');
}
}