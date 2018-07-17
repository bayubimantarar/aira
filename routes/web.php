<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::Auth();

Route::group(['prefix' => 'autentikasi'], function(){ 
    Route::get('/form-login', [
        'uses' => 'PenggunaController@showLoginForm',
        'as' => 'autentikasi.formLogin'
    ]);
    Route::post('/login', [
        'uses' => 'PenggunaController@storeLogin',
        'as' => 'autentikasi.login'
    ]);  
    Route::post('/logout', [
        'uses' => 'PenggunaController@storeLogout',
        'as' => 'autentikasi.logout'
    ]);
});

Route::group(['middleware' => 'auth:pengguna'], function(){
    Route::group(['prefix' => 'pelanggan'], function(){
        Route::get('/', [
            'uses' => 'PelangganController@index',
            'as' => 'pelanggan'
        ]);
        Route::get('/data-pelanggan', [
            'uses' => 'PelangganController@dataTablePengguna',
            'as' => 'pelanggan.dataTablePengguna'
        ]);
        Route::get('/json/data-pelanggan', [
            'uses' => 'PelangganController@dataJsonPengguna',
            'as' => 'pelanggan.dataJsonPengguna'
        ]);
        Route::get('/json/single-data-pelanggan/{id}', [
            'uses' => 'PelangganController@singleDataJsonPengguna',
            'as' => 'pelanggan.singleDataJsonPengguna'
        ]);
        Route::get('/form-tambah', [
            'uses' => 'PelangganController@create',
            'as' => 'pelanggan.formTambah'
        ]);
        Route::get('/form-ubah/{id}', [
            'uses' => 'PelangganController@edit',
            'as' => 'pelanggan.formUbah'
        ]);
        Route::post('/simpan', [
            'uses' => 'PelangganController@store',
            'as' => 'pelanggan.simpan'
        ]);
        Route::put('/ubah/{id}', [
            'uses' => 'PelangganController@update',
            'as' => 'pelanggan.ubah'
        ]);
        Route::delete('/hapus/{id}', [
            'uses' => 'PelangganController@destroy',
            'as' => 'pelanggan.hapus' 
        ]);
    });
    Route::group(['prefix' => 'penjualan'], function(){
        Route::get('/', [
            'uses' => 'PenjualanController@index',
            'as' => 'penjualan'
        ]);
        Route::get('/data-penjualan', [
            'uses' => 'PenjualanController@dataTablePenjualan',
            'as' => 'penjualan.dataTablePengguna'
        ]);
        Route::get('/form-tambah', [
            'uses' => 'PenjualanController@create',
            'as' => 'penjualan.formTambah'
        ]);
        Route::get('/detail/{id}', [
            'uses' => 'PenjualanController@detail',
            'as' => 'penjualan.detail'
        ]);
        Route::post('/simpan', [
            'uses' => 'PenjualanController@store',
            'as' => 'penjualan.simpan'
        ]);
    });
    Route::get('/', [
        'uses' => 'DasborController@index',
        'as' => 'dasbor'
    ]);
});
