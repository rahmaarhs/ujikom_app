<?php

// app/Http/Controllers/TarifController.php
namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index()
    {
        $tarif = Tarif::all();
        return view('admin.tarif.index', compact('tarif'));
    }

    public function create()
    {
        return view('admin.tarif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_plg' => 'required|string',
            'daya' => 'required|integer',
            'tarif_kwh' => 'required|integer',
            'biaya_beban' => 'required|integer',
        ]);

        Tarif::create($request->all());

        return redirect()->route('tarif.index')->with('success', 'Data tarif berhasil ditambahkan.');
    }

    public function edit(Tarif $tarif)
    {
        return view('admin.tarif.edit', compact('tarif'));
    }

    public function update(Request $request, Tarif $tarif)
    {
        $request->validate([
            'jenis_plg' => 'required|string',
            'daya' => 'required|integer',
            'tarif_kwh' => 'required|integer',
            'biaya_beban' => 'required|integer',
        ]);

        $tarif->update($request->all());

        return redirect()->route('tarif.index')->with('success', 'Data tarif berhasil diperbarui.');
    }

    public function destroy(Tarif $tarif)
    {
        $tarif->delete();

        return redirect()->route('tarif.index')->with('success', 'Data tarif berhasil dihapus.');
    }
}
