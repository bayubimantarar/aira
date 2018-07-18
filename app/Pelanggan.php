<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'email',
        'nomor_telepon',
        'panggilan',
        'status',
        'nama_perusahaan'
    ];
}
