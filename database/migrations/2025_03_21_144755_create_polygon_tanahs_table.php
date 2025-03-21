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
        Schema::create('polygon_tanah', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('marker_id');
            $table->json('coordinates');

            // Reference to the related table : MarkerTanah table
            $table->foreign('marker_id')->references('id')->on('marker_tanah');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polygon_tanah');
    }
};
