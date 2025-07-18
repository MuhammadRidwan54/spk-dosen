<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bidang_keahlian', function (Blueprint $table) {
            $table->id('id_bidang_keahlian');
            $table->string('bidang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bidang_keahlian');
    }
};