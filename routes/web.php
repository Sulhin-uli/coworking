<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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
Route::get('/', 'PelangganController@pelanggantampilan')->name('pelanggan');


Auth::routes();

Route::get('/pelanggan/pesan', 'PelangganController@index')->name('pelanggan.pesan');
Route::post('/pelanggan/save', 'PelangganController@usersave');
Route::get('/pelanggan/add', 'PelangganController@useradd');
Route::get('/pelanggan/show', 'PelangganController@usershow');
Route::get('/pelanggan/tampilan', 'PelangganController@pelanggantampilan');
Route::get('/logout_user', 'PelangganController@logout');
Route::post('/print_month', 'PelangganController@print_month');


Route::get('/berita', 'BeritaController@all');
Route::get('/edit_berita/{id}', 'BeritaController@edit');



Route::group(['middleware' => ['role:admin|pelanggan']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/form', 'TransaksiController@form');
    Route::post('/transaksi_save', 'TransaksiController@save');
    Route::get('/detail_transaksi', 'TransaksiController@detail_transaksi');
    Route::get('/transaksi', 'TransaksiController@index');
    Route::get('/tampil_transaksi', 'TransaksiController@list_data');
    Route::get('/tampil_transaksi_detail', 'TransaksiController@list_data_detail');
    Route::get('/hapus_transaksi/{id}', 'TransaksiController@hapus');
    Route::get('/struk/{id}', 'TransaksiController@struk');
});

Route::group(['middleware' => ['role:admin']], function () {
    // interface
    Route::get('/pemesanan', 'TipePemesananController@index');
    Route::get('/save_pemesanan', 'TipePemesananController@save');
    Route::get('/tampil_pemesanan', 'TipePemesananController@list_data');
    Route::get('/hapus_pemesanan/{id}', 'TipePemesananController@hapus');
    Route::get('/edit_pemesanan/{id}', 'TipePemesananController@edit');
    Route::get('/submit_edit_pemesanan/{id}', 'TipePemesananController@submit_edit');
    // user
    Route::get('/user', 'UserController@index');   
    Route::get('/tampil_user', 'UserController@list_data');
    Route::get('/save_user', 'UserController@save');
    Route::get('/hapus_user/{id}', 'UserController@hapus');
    Route::get('/edit_user/{id}', 'UserController@edit');
    Route::get('/submit_edit_user/{id}', 'userController@submit_edit');

    // Berita
    Route::get('/berita_admin', 'BeritaController@index');   
    Route::get('/save_berita', 'BeritaController@save');   
    Route::get('/tampil_berita', 'BeritaController@list_data');
    Route::get('/hapus_berita/{id}', 'BeritaController@hapus');
    // Route::get('/edit_berita/{id}', 'BeritaController@edit');
    Route::get('/submit_edit_berita/{id}', 'BeritaController@submit_edit');
    
});

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('/login');
 });

 Route::get('/riwayat', 'RiwayatController@index');
 Route::get('/hapus_riwayat/{id}', 'RiwayatController@hapus');
 Route::get('/riwayat_single', 'RiwayatController@index_single');
 Route::get('/tampil_riwayat', 'RiwayatController@list_data');
 Route::get('/tampil_riwayat_single', 'RiwayatController@list_data_single');

