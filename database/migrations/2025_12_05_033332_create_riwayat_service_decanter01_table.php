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
    Schema::create('riwayat_service_decanter01', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal');
        $table->integer('hm_hari_ini');
        $table->integer('last_service');
        $table->integer('next_service');
       /* $table->string('nama_barang');
        $table->integer('jumlah_barang');
        $table->integer('harga');*/
        $table->string('nama_petugas');
        $table->string('alat_kerja');
        $table->time('waktu_mulai');
        $table->time('waktu_selesai');
        $table->integer('lama_penggantian');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('riwayat_service_decanter01');
}

};
