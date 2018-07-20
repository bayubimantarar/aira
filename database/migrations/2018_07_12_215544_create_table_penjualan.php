<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice');
            $table->string('letter_of_guarantee');
            $table->string('remakrs');
            $table->string('penjualan');
            $table->string('pembelian');
            $table->timestamp('tanggal_bayar');
            $table->string('pembayaran_via');
            $table->string('agent');
            $table->string('nomor_tiket')->nullable();
            $table->string('kode_boking')->nullable();
            $table->string('nik');
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
        Schema::dropIfExists('penjualan');
    }
}
