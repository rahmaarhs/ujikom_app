<?php

// app/Http/Controllers/PetugasController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        // Mengambil petugas dengan type 'Petugas'
        $petugas = User::where('type', '2')->get();
        return view('admin.petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menambah petugas baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => 2, // Petugas
        ]);        

        // Redirect dengan pesan sukses
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Update data petugas
        $petugas = User::findOrFail($id);
        $petugas->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data petugas
        $petugas = User::findOrFail($id);
        $petugas->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus.');
    }
}
