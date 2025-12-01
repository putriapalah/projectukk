<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bukuTanah', function (Blueprint $table) {
            $table->string('kodeBT')->primary();
            $table->string('nama_kecamatan');
            $table->string('namaDesa');
            $table->enum('jenis_hak', ['Hak Milik', 'Hak Guna Bangun', 'Hak Pakai']);
            $table->string('lokasi_penyimpanan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bukuTanah');
    }
};
