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
            $table->integer('hm_hari_ini');
            $table->integer('last_service');
            $table->integer('next_service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_decanter01'); // ✅ diperbaiki dari 'riwayat_decanter01s'
    }
};
