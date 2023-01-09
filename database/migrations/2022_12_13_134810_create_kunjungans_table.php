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
            $table->enum('shift', ['1', '2', '3']);
            $table->string('jaminan', 50);
            $table->string('poli', 50);
            $table->unsignedBigInteger('rekam_id');
            $table->unsignedBigInteger('dokter_id');
            $table->string('sis', 10)->nullable();
            $table->string('dias', 10)->nullable();
            $table->string('bb', 10)->nullable();
            $table->string('keluhan', 100)->nullable();
            $table->string('diagnosis_utama', 100)->nullable();
            $table->string('diagnosis_tambahan', 100)->nullable();
            $table->string('icd', 100)->nullable();
            $table->string('gds', 100)->nullable();
            $table->string('au', 100)->nullable();
            $table->string('choi', 100)->nullable();
            $table->string('nama_tindakan', 70)->nullable();
            $table->string('operator', 70)->nullable();
            $table->string('asisten', 70)->nullable();
            $table->unsignedBigInteger('biaya_id')->nullable();
            $table->timestamps();

            $table->foreign('rekam_id')->references('id')->on('rekams');
            $table->foreign('dokter_id')->references('id')->on('dokters');
            $table->foreign('biaya_id')->references('id')->on('biayas');
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
