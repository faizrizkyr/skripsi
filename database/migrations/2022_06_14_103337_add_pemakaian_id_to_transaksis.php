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
        Schema::table('transaksis', function (Blueprint $table) {
          $table->foreignId('pemakaian_id')->nullable();
          $table->foreign('pemakaian_id')->references('id')->on('pemakaians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign('transaksis_pemakaian_id_foreign');
            $table->dropColumn('pemakaian_id');
        });
    }
};
