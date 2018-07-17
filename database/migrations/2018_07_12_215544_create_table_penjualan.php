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
            $table->string('nik');
            $table->string('nomor_tiket');
            $table->string('kode_tiket');
            $table->timestamp('tanggal_keberangkatan');
            $table->string('kota_keberangkatan');
            $table->string('kota_kedatangan');
            $table->string('harga_tiket');
            $table->string('jumlah_tiket');
            $table->string('total_harga');
            $table->string('status');
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
