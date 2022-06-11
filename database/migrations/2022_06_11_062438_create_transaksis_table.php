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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bahanbaku_id');
            $table->integer('jumlah');
            $table->dateTime('tgl_transaksi');
            $table->string('jenis_transaksi');
            $table->foreignId('pemesanan_id');
            $table->timestamps();
            $table->foreign('bahanbaku_id')->references('id')->on('bahanbakus')->onDelete('cascade');
            $table->foreign('pemesanan_id')->references('id')->on('pemesanans')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
