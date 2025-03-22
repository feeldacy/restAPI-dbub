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
        Schema::create('marker_tanah', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('detail_tanah_id');
            $table->decimal('latitude',8,6);
            $table->decimal('longitude', 9,6);

            // Reference to the related table: DetailTanah table
            $table->foreign('detail_tanah_id')->references('id')->on('detail_tanah')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marker_tanah');
    }
};
