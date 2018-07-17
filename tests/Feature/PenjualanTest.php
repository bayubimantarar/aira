<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PenjualanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPenjualanPage()
    {
        $pengguna = Factory(\App\Pengguna::class)
            ->create();

        $openPenjualanPage = $this
            ->actingAs($pengguna, 'pengguna')
            ->get('/penjualan')
            ->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFormTambahPenjualanPage()
    {
        $pengguna = Factory(\App\Pengguna::class)
            ->create();

        $openPenjualanPage = $this
            ->actingAs($pengguna, 'pengguna')
            ->get('/penjualan/form-tambah')
            ->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStoreDataPenjualan()
    {
        $pengguna = Factory(\App\Pengguna::class)
            ->create();

        $storeDataPenjualan = $this
            ->actingAs($pengguna, 'pengguna')
            ->json('post', '/penjualan/simpan', [
                'nik' => '123',
                'nomor_tiket' => '9952018',
                'kode_tiket' => 'AZQ001',
                'tanggal_keberangkatan' => date('Y-m-d h:i:s'),
                'kota_keberangkatan' => 'Bandung',
                'kota_kedatangan' => 'Jakarta',
                'harga_tiket' => '500000',
                'jumlah_tiket' => '2',
                'total_harga' => '1000000'
            ])
            ->assertStatus(302);

    }
}
