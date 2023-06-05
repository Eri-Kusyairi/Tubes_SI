<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbPegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = TbPegawai::all();
        return view('Datapegawai', compact('pegawai'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'Alamat' => 'required',
            'Jabatan' => 'required',
            'no_hp' => 'required',
        ]);

        TbPegawai::create($request->all());

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai created successfully.');
    }

    public function show(TbPegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit(TbPegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, TbPegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'Alamat' => 'required',
            'Jabatan' => 'required',
            'no_hp' => 'required',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai updated successfully');
    }

    public function destroy(TbPegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai deleted successfully');
    }
}