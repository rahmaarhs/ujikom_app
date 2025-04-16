<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pemakaian', function (Blueprint $table) {
            $table->id('id'); // IDPemakaian
            $table->char('no_kontrol', 12);
            $table->integer('tahun');
            $table->tinyInteger('bulan');
            $table->integer('meter_awal');
            $table->integer('meter_akhir');
            $table->integer('jumlah_pakai');
            $table->integer('biaya_beban_pemakai');
            $table->integer('biaya_pemakaian');
            $table->timestamps();

            $table->foreign('no_kontrol')->references('no_kontrol')->on('pelanggans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemakaian');
    }
};
