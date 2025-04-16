<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::with('tarif')->get();
        return view('admin.pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        $tarifs = Tarif::all();
        return view('admin.pelanggan.create', compact('tarifs'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'no_kontrol' => 'required|unique:pelanggans,no_kontrol|size:12',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => ['required', 'regex:/^08[0-9]{8,10}$/', 'max:12'],
            'jenis_plg' => 'required|string|exists:tarif,jenis_plg',
        ]);

        // Simpan data pelanggan
        Pelanggan::create($request->all());

        // Redirect setelah sukses
        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $tarifs = Tarif::all();
        return view('admin.pelanggan.edit', compact('pelanggan', 'tarifs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_kontrol' => 'required|size:12|unique:pelanggans,no_kontrol,' . $id,
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => ['required', 'regex:/^08[0-9]{8,10}$/', 'max:12'],
            'jenis_plg' => 'required|string|exists:tarif,jenis_plg',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pelanggan::findOrFail($id)->delete();
        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil dihapus');
    }
}
