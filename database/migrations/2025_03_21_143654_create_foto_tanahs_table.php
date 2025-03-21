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
        Schema::create('foto_tanah', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('detail_tanah_id');
            $table->string('nama_foto_tanah')->unique();
            $table->string('ukuran_foto_tanah');

            // Reference to related tables : DetailTanah table
            $table->foreign('detail_tanah_id')->references('id')->on('detail_tanah');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_tanah');
    }
};
