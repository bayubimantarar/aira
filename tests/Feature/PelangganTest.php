<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PelangganTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPelangganPage()
    {
        $pengguna = Factory(\App\Pengguna::class)
            ->create();

        $pelangganPage = $this
            ->actingAs($pengguna, 'pengguna')
            ->get('/pelanggan')
            ->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFormTambahPage()
    {
        $pengguna = Factory(\App\Pengguna::class)
            ->create();

        $pelangganPage = $this
            ->actingAs($pengguna, 'pengguna')
            ->get('/pelanggan/form-tambah')
            ->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStoreDataPelanggan()
    {
        $pengguna = Factory(\App\Pengguna::class)
            ->create();

        $storeDataPelanggan = $this
            ->actingAs($pengguna, 'pengguna')
            ->json('post', '/pelanggan/simpan', [
                'nik' => '123',
                'nama' => 'Bayu Bimantara',
                'alamat' => 'Bandung',
                'email' => 'me@bimantara.web.id',
                'nomor_telepon' => 895332
            ])
            ->assertStatus(200);

        $checkDataPelanggan = $this
            ->assertDatabaseHas('pelanggan', [
                'nik' => '123',
                'nama' => 'Bayu Bimantara',
                'alamat' => 'Bandung',
                'email' => 'me@bimantara.web.id',
                'nomor_telepon' => 895332
            ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateDataPelanggan()
    {
        $pengguna = Factory(\App\Pengguna::class)
            ->create();

        $storeDataPelanggan = $this
            ->actingAs($pengguna, 'pengguna')
            ->json('post', '/pelanggan/simpan', [
                'nik' => '123',
                'nama' => 'Bayu Bimantara',
                'alamat' => 'Bandung',
                'email' => 'me@bimantara.web.id',
                'nomor_telepon' => 895332
            ])
            ->assertStatus(302);

        $checkDataPelanggan = $this
            ->assertDatabaseHas('pelanggan', [
                'nik' => '123',
                'nama' => 'Bayu Bimantara',
                'alamat' => 'Bandung',
                'email' => 'me@bimantara.web.id',
                'nomor_telepon' => 895332
            ]);

        $updateDataPelanggan = $this
            ->actingAs($pengguna, 'pengguna')
            ->json('put', '/pelanggan/ubah/1', [
                'nik' => '321',
                'nama' => 'Bayu Bismaka',
                'alamat' => 'Cimahi',
                'email' => 'bismaka@gmail.com',
                'nomor_telepon' => 99
            ])
            ->assertStatus(302);

        $checkDataPelanggan = $this
            ->assertDatabaseHas('pelanggan', [
                'nik' => '321',
                'nama' => 'Bayu Bismaka',
                'alamat' => 'Cimahi',
                'email' => 'bismaka@gmail.com',
                'nomor_telepon' => 99
            ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDestroyDataPelanggan()
    {
        $pengguna = Factory(\App\Pengguna::class)
            ->create();

        $storeDataPelanggan = $this
            ->actingAs($pengguna, 'pengguna')
            ->json('post', '/pelanggan/simpan', [
                'nik' => '123',
                'nama' => 'Bayu Bimantara',
                'alamat' => 'Bandung',
                'email' => 'me@bimantara.web.id',
                'nomor_telepon' => 895332
            ])
            ->assertStatus(302);

        $checkDataPelanggan = $this
            ->assertDatabaseHas('pelanggan', [
                'nik' => '123',
                'nama' => 'Bayu Bimantara',
                'alamat' => 'Bandung',
                'email' => 'me@bimantara.web.id',
                'nomor_telepon' => 895332
            ]);

        $destroyDataPelanggan = $this
            ->actingAs($pengguna, 'pengguna')
            ->json('delete', '/pelanggan/hapus/1')
            ->assertStatus(200);
    }
}
