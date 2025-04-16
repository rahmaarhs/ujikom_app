<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_pemakaian');
        $table->date('tanggal_bayar');
        $table->integer('total_bayar');
        $table->integer('uang_bayar')->nullable(); // tidak pakai ->after()
        $table->integer('uang_kembali')->nullable();
        $table->timestamps();

        $table->foreign('id_pemakaian')->references('id')->on('pemakaians')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::table('pembayarans', function (Blueprint $table) {
                $table->dropColumn(['uang_bayar', 'uang_kembali']);
            });
    }
};
