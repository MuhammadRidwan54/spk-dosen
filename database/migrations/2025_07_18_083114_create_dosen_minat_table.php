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
        Schema::create('dosen_minat', function (Blueprint $table) {
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('minat_id');
            
            $table->foreign('dosen_id')
                ->references('id_dosen')
                ->on('dosen')
                ->cascadeOnDelete();
                
            $table->foreign('minat_id')
                ->references('id_minat')
                ->on('minat')
                ->cascadeOnDelete();
                
            $table->primary(['dosen_id', 'minat_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_minat');
    }
};
