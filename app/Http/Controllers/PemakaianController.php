<?php

// app/Http/Controllers/PemakaianController.php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\Tarif;
use Illuminate\Support\Facades\DB;

class PemakaianController extends Controller
{
    public function index()
    {
        $data = Pemakaian::with('pelanggan')->get();
        return view('admin.pemakaian.index', compact('data'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('admin.pemakaian.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => ['required', 'regex:/^(0[1-9]|1[0-2])$/'],
            'tahun' => 'required|integer',
            'meter_awal' => 'required|integer|min:0',
            'meter_akhir' => 'required|integer|min:0|gte:meter_awal',
            'no_kontrol' => 'required|exists:pelanggans,no_kontrol',
        ]);
        
        // Menghitung jumlah pemakaian
        $jumlahPakai = $request->meter_akhir - $request->meter_awal;
        
        // Ambil data pelanggan
        $pelanggan = Pelanggan::where('no_kontrol', $request->no_kontrol)->first();
        
        // Ambil tarif berdasarkan jenis_plg dan daya
        $tarif = Tarif::where('jenis_plg', $pelanggan->jenis_plg)
              ->where('daya', $pelanggan->daya)
              ->first();
        
        // Jika tarif tidak ditemukan, fallback ke nilai default
        $biayaBeban = $tarif->biaya_beban ?? 0;
        $tarifPerKwh = $tarif->tarif_kwh ?? 1444; // Default tarif KWH jika tidak ditemukan
        
        // Hitung biaya beban pemakai (biaya tetap untuk pelanggan)
        $biayaBebanPemakai = $biayaBeban;
    
        // Simpan data pemakaian
        Pemakaian::create([
            'no_kontrol' => $request->no_kontrol,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
            'jumlah_pakai' => $jumlahPakai,
            'biaya_beban_pemakai' => $biayaBebanPemakai,
            'biaya_pemakaian' => $jumlahPakai * $tarifPerKwh,
        ]);
        
        return redirect()->route('admin.pemakaian.index')->with('success', 'Data berhasil ditambahkan!');
    }
    
}
