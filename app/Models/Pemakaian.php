<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    protected $table = 'pemakaian';
    protected $primaryKey = 'id';

    protected $fillable = [
        'no_kontrol',
        'tahun',
        'bulan',
        'meter_awal',
        'meter_akhir',
        'jumlah_pakai',
        'biaya_beban_pemakai',
        'biaya_pemakaian',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'no_kontrol', 'no_kontrol');
    }
}
