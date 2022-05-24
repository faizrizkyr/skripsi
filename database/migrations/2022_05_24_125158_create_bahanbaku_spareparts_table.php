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
        Schema::create('bahanbaku_spareparts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sparepart_id');
            $table->foreignId('bahanbaku_id');
            $table->integer('jumlah');
            $table->timestamps();
            $table->foreign('sparepart_id')->references('id')->on('spareparts')->onDelete('cascade');
            $table->foreign('bahanbaku_id')->references('id')->on('bahanbakus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bahanbaku_spareparts');
    }
};
