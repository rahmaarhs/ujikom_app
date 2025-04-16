<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->char('no_kontrol', 12)->unique();
            $table->string('nama');
            $table->text('alamat');
            $table->string('telepon');

            $table->string('jenis_plg');

            // FOREIGN KEY ke tabel tarif
            $table->foreign('jenis_plg')
                ->references('jenis_plg')
                ->on('tarif')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
