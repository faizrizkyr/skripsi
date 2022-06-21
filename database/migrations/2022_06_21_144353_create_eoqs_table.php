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
        Schema::create('eoqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bahanbaku_id');
            $table->integer('tahun');
            $table->integer('holding_cost');
            $table->integer('jml_kebutuhan');
            $table->integer('biaya_order');
            $table->float('eoq');
            $table->float('frekuesi_order');
            $table->float('interval_order');
            $table->timestamps();
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
        Schema::dropIfExists('eoqs');
    }
};
