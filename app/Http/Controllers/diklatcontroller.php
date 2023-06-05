<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\diklat;

class diklatcontroller extends Controller
{
    public function index()
    {
        $diklats = diklat::all();
        return view('jenisdiklat', compact('diklats'));
    }

    public function create()
    {
        return view('diklat.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namadiklat' => 'required',
            'hari' => 'required',
            'jumlahjam' => 'required',
        ]);

        diklat::create($validatedData);

        return redirect('/jenisdiklat')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(diklat $diklat)
    {
        return view('diklat.edit', compact('diklat'));
    }

    public function update(Request $request, $id_jenisdiklat)
{
    $validatedData = $request->validate([
        'namadiklat' => 'required',
        'hari' => 'required',
        'jumlahjam' => 'required',
    ]);

    $diklat = diklat::find($id_jenisdiklat);

    if ($diklat) {
        $diklat->update($validatedData);
        return redirect('/jenisdiklat')->with('success', 'Data berhasil diperbarui');
    } else {
        return redirect('/jenisdiklat')->with('error', 'Data tidak ditemukan');
    }
}
public function destroy(diklat $diklat)
{
    // Hapus data kelas dari database
    $diklat->delete();

    // Redirect ke halaman index diklat dengan pesan sukses
    return redirect('/jenisdiklat')->with('success', 'diklat berhasil dihapus.');
}

}