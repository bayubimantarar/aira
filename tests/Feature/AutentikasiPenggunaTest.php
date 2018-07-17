<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AutentikasiPenggunaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @test itTestOpenPageFormLogin
     */
    public function testLoginPage()
    {
        $openFormLoginPage = $this
            ->get('/autentikasi/form-login')
            ->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @test itTestLogin
     */
    public function itTestLogin()
    {
        $storeDataFakerPengguna = Factory(App\Pengguna::class)
            ->create();

        $checkDataPengguna = $this
            ->assertDatabaseHas('pengguna', [
                'nama' => 'Administrator Aira',
                'email' => 'admin@aira.com',
                'password' => '123',
                'akses' => 1
            ]);

        $login = $this
            ->json('post', '/autentikasi/login', [
                'email' => 'admin@aira.com',
                'password' => '123',
            ])
            ->assertJson(['login' => true])
            ->assertStatus(200);
    }
}
