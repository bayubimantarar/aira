<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $dates = [
        'tanggal_keberangkatan'
    ];
    protected $fillable = [
        'nik',
        'nomor_tiket',
        'kode_tiket',
        'tanggal_keberangkatan',
        'kota_keberangkatan',
        'kota_kedatangan',
        'harga_tiket',
        'jumlah_tiket',
        'total_harga',
        'status'
    ];
}
