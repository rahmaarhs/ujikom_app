<?php

namespace App\Models;

use App\Models\Pemakaian;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'id_pemakaian',
        'tanggal_bayar',
        'total_bayar',
    ];

    public function pemakaian()
    {
        return $this->belongsTo(Pemakaian::class, 'id_pemakaian');
    }

}
