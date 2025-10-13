<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('laporan_dokter', function (Blueprint $table) {
        $table->id();
        $table->foreignId('dokter_id')->constrained('users')->onDelete('cascade');
        $table->string('nama_pasien');
        $table->string('diagnosa');
        $table->text('catatan_medis')->nullable();
        $table->text('resep_obat')->nullable();
        $table->string('tekanan_darah')->nullable();
        $table->string('suhu_tubuh')->nullable();
        $table->string('detak_jantung')->nullable();
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('laporan_dokter');
    }
};
