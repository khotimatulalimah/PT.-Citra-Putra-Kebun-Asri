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
        Schema::create('riwayat_decanter01', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('paten_hm')->default(4000); // otomatis 4000
            $table->integer('hm_hari_ini');             // diisi manual
            $table->integer('last_service');           // diisi manual
            $table->integer('jam_operasional');        // diisi manual
            $table->integer('sisa_waktu_service');     // otomatis = 4000 - jam_operasional
            $table->integer('next_service');           // otomatis = hm_hari_ini + sisa_waktu_service
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_decanter01');
    }
};
