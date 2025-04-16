<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $table = 'tarif';

    protected $fillable = [
        'jenis_plg',
        'daya',
        'tarif_kwh',
        'biaya_beban',
    ];
}

