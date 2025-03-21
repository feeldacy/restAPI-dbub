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
        Schema::create('detail_tanah', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama_tanah')->unique(true);
            $table->double('luas_tanah');
            $table->string('alamat_id');
            $table->string('status_kepemilikan_id');
            $table->string('status_tanah_id');
            $table->string('tipe_tanah_id');

            // Reference to related tables
            $table->foreign('status_kepemilikan_id')->references('id')->on('status_kepemilikan');
            $table->foreign('status_tanah_id')->references('id')->on('status_tanah');
            $table->foreign('tipe_tanah_id')->references('id')->on('tipe_tanah');
            $table->foreign('alamat_id')->references('id')->on('alamat_tanah');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_tanah');
    }
};
