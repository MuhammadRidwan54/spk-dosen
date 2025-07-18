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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id('id_dosen');
            $table->string('nama');
            $table->string('nik')->unique();
            $table->foreignId('pendidikan_terakhir_id')->constrained('pendidikan_terakhir');
            $table->foreignId('jabatan_fungsional_id')->constrained('jabatan_fungsional');
            $table->foreignId('kuota_bimbingan_id')->constrained('kuota_bimbingan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
