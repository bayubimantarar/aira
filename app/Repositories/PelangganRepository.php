<?php

namespace App\Repositories;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganRepository
{
    public function getAllDataPelanggan()
    {
        $pelanggan = Pelanggan::all();

        return $pelanggan;
    }

    public function getSingleDataPelanggan($id)
    {
        $pelanggan = Pelanggan::where('id', $id)
            ->firstOrFail();

        return $pelanggan;
    }

    public function checkNIK($nik)
    {
        $pelanggan = Pelanggan::where('nik', $nik)
            ->first();

        return $pelanggan;
    }

    public function storeDataPelanggan($pelanggan)
    {
        $pelangganStore = Pelanggan::create($pelanggan);

        return $pelangganStore;
    }

    public function updateDataPelanggan($pelanggan, $id)
    {
        $pelangganUpdate = Pelanggan::where('id', $id)
            ->update($pelanggan);

        return $pelangganUpdate;
    }

    public function destroyDataPelanggan($id)
    {
        $pelangganDestroy = Pelanggan::destroy($id);

        return $pelangganDestroy;
    }
}
