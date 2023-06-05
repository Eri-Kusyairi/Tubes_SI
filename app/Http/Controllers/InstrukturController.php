<?php

namespace App\Http\Controllers;

use App\Models\TbPengajar;
use App\Models\TbKelas;
use Illuminate\Http\Request;

class InstrukturController extends Controller
{
    public function index()
    {
        $instrukturs = TbPengajar::with('jenisDiklat')->get();
        return view('Datapengajar', compact('instrukturs'));
    }

    public function create()
    {
        // Kode untuk menampilkan halaman create instruktur
    }

    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'namainstruktur' => 'required',
            'Gender' => 'required',
            'no_hp' => 'required',
            'id_jenisdiklat' => 'required',
        ]);

        $instruktur = new TbPengajar();
        $instruktur->namainstruktur = $request->input('namainstruktur');
        $instruktur->Gender = $request->input('Gender');
        $instruktur->no_hp = $request->input('no_hp');
        $instruktur->id_jenisdiklat = $request->input('id_jenisdiklat');
        $instruktur->save();

        return redirect('/Datapengajar')->with('success', 'Data berhasil ditambahkan');
        // Redirect atau respon sukses
    }

    public function edit($id)
    {
        $instruktur = TbPengajar::findOrFail($id);
        // Kode untuk menampilkan halaman edit instruktur
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari request
        $validatedData = $request->validate([
            'namainstruktur' => 'required',
            'Gender' => 'required',
            'no_hp' => 'required',
            'id_jenisdiklat' => 'required',
        ]);

        $instruktur = TbPengajar::findOrFail($id);
        $instruktur->namainstruktur = $request->input('namainstruktur');
        $instruktur->Gender = $request->input('Gender');
        $instruktur->no_hp = $request->input('no_hp');
        $instruktur->id_jenisdiklat = $request->input('id_jenisdiklat');
        $instruktur->save();

        return redirect('/Datapengajar')->with('success', 'Data berhasil diperbarui');
        // Redirect atau respon sukses
    }
        public function destroy(TbPengajar $instruktur)
        {
            $instruktur->delete();
    
            return redirect('/Datapengajar')->with('success', 'Data berhasil dihapus');
        }
}