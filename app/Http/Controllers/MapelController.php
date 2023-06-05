<?php

namespace App\Http\Controllers;

use App\Models\TbMapel;
use App\Models\Diklat;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = TbMapel::with('jenisDiklat')->get();
        return view('Mapel', compact('mapels'));
    }

    public function create()
    {
  
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama_Mapel' => 'required',
            'namainstruktur' => 'required',
            'id_jenisdiklat' => 'required',
        ]);

        $mapel = new TbMapel();
        $mapel->Nama_Mapel = $request->input('Nama_Mapel');
        $mapel->namainstruktur = $request->input('namainstruktur');
        $mapel->id_jenisdiklat = $request->input('id_jenisdiklat');
        $mapel->save();

        return redirect('/Mapel')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(TbMapel $mapel)
    {
        // ...
    }

    public function update(Request $request, TbMapel $mapel)
    {
        $validatedData = $request->validate([
            'Nama_Mapel' => 'required',
            'namainstruktur' => 'required',
            'id_jenisdiklat' => 'required',
        ]);

        $mapel->Nama_Mapel = $request->input('Nama_Mapel');
        $mapel->namainstruktur = $request->input('namainstruktur');
        $mapel->id_jenisdiklat = $request->input('id_jenisdiklat');
        $mapel->save();

        return redirect('/Mapel')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(TbMapel $mapel)
    {
        $mapel->delete();

        return redirect('/Mapel')->with('success', 'Data berhasil dihapus');
    }
}