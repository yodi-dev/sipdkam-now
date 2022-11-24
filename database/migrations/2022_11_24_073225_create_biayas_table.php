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
        Schema::create('biayas', function (Blueprint $table) {
            $table->id();
            $table->integer('adm')->nullable();
            $table->integer('obat')->nullable();
            $table->integer('tuslah')->nullable();
            $table->integer('jasa_dokter')->nullable();
            $table->integer('injeksi')->nullable();
            $table->integer('jasa_tindakan')->nullable();
            $table->integer('bahp')->nullable();
            $table->integer('lab')->nullable();
            $table->integer('pasang_infus')->nullable();
            $table->integer('cairan_infus')->nullable();
            $table->integer('akomodasi')->nullable();
            $table->integer('jasa_perawat')->nullable();
            $table->integer('diit')->nullable();
            $table->integer('lain_lain')->nullable();
            $table->integer('pembulat')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biayas');
    }
};
