<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('foto_tanah', function (Blueprint $table) {
            $table->dropForeign(['detail_tanah_id']); // Hapus foreign key lama
            $table->foreign('detail_tanah_id')->references('id')->on('detail_tanah')->onDelete('cascade');
        });
        Schema::table('sertifikat_tanah', function (Blueprint $table) {
            $table->dropForeign(['detail_tanah_id']); // Hapus foreign key lama
            $table->foreign('detail_tanah_id')->references('id')->on('detail_tanah')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('foto_tanah', function (Blueprint $table) {
            $table->dropForeign(['detail_tanah_id']);
            $table->foreign('detail_tanah_id')->references('id')->on('detail_tanah');
        });
        Schema::table('sertifikat_tanah', function (Blueprint $table) {
            $table->dropForeign(['detail_tanah_id']);
            $table->foreign('detail_tanah_id')->references('id')->on('detail_tanah');
        });
    }
};
