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
        Schema::create('layanan_aduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('nomor_telepon_pemohon');
            $table->text('deskripsi_aduan');
            $table->timestamps();

            
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('layanan_aduan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User yang mengirim aduan
            $table->string('nama_pemohon');
            $table->string('nomor_telepon_pemohon');
            $table->text('deskripsi_aduan');

            // Kolom khusus admin
            $table->enum('status', ['Baru', 'Diproses', 'Selesai'])->default('Baru');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }
};
