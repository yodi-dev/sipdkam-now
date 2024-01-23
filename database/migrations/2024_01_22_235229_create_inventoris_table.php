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
        Schema::create('inventoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_item', 100)->nullable();
            $table->string('generik', 100)->nullable();
            $table->string('satuan', 100)->nullable();
            $table->integer('stok');
            $table->date('expired_date')->nullable();
            $table->string('locater', 100)->nullable();
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
        Schema::dropIfExists('inventoris');
    }
};
