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
        Schema::create('alamat_tanah', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('detail_alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('padukuhan');
            $table->string('kalurahan')->default('Umbulharjo');
            $table->string('kecamatan')->default('Cangkringan');
            $table->string('kabupaten')->default('Sleman');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat_tanah');
    }
};
