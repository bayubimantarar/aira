<?php

namespace App\Repositories;

use DB;
use App\Penjualan;
use App\Pelanggan;
use Illuminate\Http\Request;

class PenjualanRepository
{
    public function getAllDataPenjualan()
    {
        $penjualan = DB::table('pelanggan')
            ->join('penjualan', 'pelanggan.nik', '=', 'penjualan.nik')
            ->select('penjualan.*', 'pelanggan.nik', 'pelanggan.nama', 'pelanggan.alamat')
            ->get();

        return $penjualan;
    }

    public function getSingleDataPenjualan($id)
    {
        $penjualan = DB::table('pelanggan')
            ->join('penjualan', 'pelanggan.nik', '=', 'penjualan.nik')
            ->select('penjualan.*', 'pelanggan.nik', 'pelanggan.nama', 'pelanggan.alamat')
            ->where('penjualan.id', '=', $id)
            ->first();

        return $penjualan;
    }

    // public function checkNIK($nik)
    // {
    //     $pelanggan = Pelanggan::where('nik', $nik)
    //         ->first();

    //     return $pelanggan;
    // }

    public function storeDataPenjualan($penjualan)
    {
        $penjualanStore = Penjualan::create($penjualan);

        return $penjualanStore;
    }

    // public function updateDataPelanggan($pelanggan, $id)
    // {
    //     $pelangganUpdate = Pelanggan::where('id', $id)
    //         ->update($pelanggan);

    //     return $pelangganUpdate;
    // }

    // public function destroyDataPelanggan($id)
    // {
    //     $pelangganDestroy = Pelanggan::destroy($id);

    //     return $pelangganDestroy;
    // }
}
