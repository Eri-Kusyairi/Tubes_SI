<?php

namespace App\Http\Controllers;

use App\Models\tbPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tbPenggunaController extends Controller
{
    public function index()
    {
        $pengguna = tbPengguna::all();
        return view('pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        tbPengguna::create($request->all());

        return redirect('/Login')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(tbPengguna $pengguna)
    {
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, tbPengguna $pengguna)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $pengguna->update($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(tbPengguna $pengguna)
    {
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function login(Request $request)
    {
        {
            $credentials = $request->only('username', 'password');
        
            $pengguna = tbPengguna::where('username', $credentials['username'])->first();
        
            if ($pengguna && $pengguna->password == $credentials['password']) {
                // Authentication successful
                // You can customize the logic here, such as setting session data or redirecting to a specific page
                return redirect()->intended('dasboard'); // Replace 'admin' with your desired destination URL
            } else {
                // Authentication failed
                return redirect()->back()->with('loginError', 'Invalid username or password.');
            }
        }
        
}
}