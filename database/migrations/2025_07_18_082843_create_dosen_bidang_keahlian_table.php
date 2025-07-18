<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dosen_bidang_keahlian', function (Blueprint $table) {
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('bidang_keahlian_id');
            
            $table->foreign('dosen_id')
                  ->references('id_dosen')
                  ->on('dosen')
                  ->onDelete('cascade');
                  
            $table->foreign('bidang_keahlian_id')
                  ->references('id_bidang_keahlian')
                  ->on('bidang_keahlian')
                  ->onDelete('cascade');
                  
            $table->primary(['dosen_id', 'bidang_keahlian_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen_bidang_keahlian');
    }
};