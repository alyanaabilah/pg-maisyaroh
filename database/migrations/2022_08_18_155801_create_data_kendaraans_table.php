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
        Schema::create('data_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_polisi');
            $table->string('merk_kendaraan');
            $table->string('transmisi');
            $table->integer('tahun_perawatan');
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
        Schema::dropIfExists('data_kendaraans');
    }
};
