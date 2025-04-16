<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tarif')->insert([
            [
                'jenis_plg' => 'R-1',
                'daya' => 900,
                'tarif_kwh' => 1444,
                'biaya_beban' => 30000, // Non-subsidi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'R-1',
                'daya' => 1300,
                'tarif_kwh' => 1444,
                'biaya_beban' => 40000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'R-1',
                'daya' => 2200,
                'tarif_kwh' => 1444,
                'biaya_beban' => 60000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'R-2',
                'daya' => 3500,
                'tarif_kwh' => 1444,
                'biaya_beban' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'R-3',
                'daya' => 6600,
                'tarif_kwh' => 1444,
                'biaya_beban' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'B-1',
                'daya' => 5500,
                'tarif_kwh' => 1444,
                'biaya_beban' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'B-2',
                'daya' => 6600,
                'tarif_kwh' => 1112,
                'biaya_beban' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'B-3',
                'daya' => 200000,
                'tarif_kwh' => 1112,
                'biaya_beban' => 750000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'I-3',
                'daya' => 200000,
                'tarif_kwh' => 1060,
                'biaya_beban' => 750000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'I-4',
                'daya' => 30000000,
                'tarif_kwh' => 997,
                'biaya_beban' => 1195200000, // Sesuai sebelumnya, karena ini golongan besar
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'P-1',
                'daya' => 6600,
                'tarif_kwh' => 1112,
                'biaya_beban' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_plg' => 'P-2',
                'daya' => 200000,
                'tarif_kwh' => 1112,
                'biaya_beban' => 12176000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);        
    }
}
