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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('pemeriksaans');
    }
};
