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
            $table->unsignedBigInteger('detail_kunjungan_id');
            $table->unsignedBigInteger('rekam_id');
            $table->unsignedBigInteger('biaya_id')->nullable();
            $table->unsignedBigInteger('pemeriksaan_id')->nullable();
            $table->unsignedBigInteger('tindakan_id')->nullable();
            $table->unsignedBigInteger('dokter_id');
            $table->timestamps();

            $table->foreign('detail_kunjungan_id')->references('id')->on('detail_kunjungans');
            $table->foreign('rekam_id')->references('id')->on('rekams');
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
