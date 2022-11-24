<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_id');
            $table->unsignedBigInteger('rekam_medis_id');
            $table->unsignedBigInteger('biaya_id');
            $table->unsignedBigInteger('pemeriksaan_id');
            $table->unsignedBigInteger('tindakan_id');
            $table->unsignedBigInteger('dokter_id');
            $table->timestamps();

            $table->foreign('detail_id')->references('id')->on('detail_kunjungans');
            $table->foreign('rekam_medis_id')->references('id')->on('rekam_medis');
            $table->foreign('biaya_id')->references('id')->on('biayas');
            $table->foreign('pemeriksaan_id')->references('id')->on('pemeriksaans');
            $table->foreign('tindakan_id')->references('id')->on('tindakans');
            $table->foreign('dokter_id')->references('id')->on('dokters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kunjungans');
    }
};
