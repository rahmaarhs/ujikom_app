<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_kontrol';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'no_kontrol',
        'nama',
        'alamat',
        'telepon',
        'jenis_plg',
        'daya',  // Tambahkan ini
    ];    

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'jenis_plg', 'jenis_plg');
    }
}
