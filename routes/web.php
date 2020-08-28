<?php

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


Route::get('/', 'AdminData\DaftarUmatController@index')->name('home');
Route::get('/dataUmat/{id}', 'AdminData\DaftarUmatController@show');
Route::get('/dataUmat/PDF/{id}', 'AdminData\DaftarUmatController@cetak_pdf');
Route::get('/umatPribadi', 'AdminData\UmatPribadiController@index');
Route::get('/umatPribadi/livesearch/{keyword}', 'AdminData\UmatPribadiController@liveSearch');
Route::get('/detailUmat/{umat_nama}', 'AdminData\UmatPribadiController@detail');

//Berita

Route::get('/tambah-acara', 'AdminBerita\PagesController@getTembahAcara');
Route::get('/tambah-subacara','AdminBerita\PagesController@getSubacara');
Route::get('/input-peserta', 'AdminBerita\PagesController@getInputPeserta');
Route::get('/daftar-peserta', 'AdminBerita\PagesController@getDaftarPeserta');
Route::get('/welcome', 'AdminBerita\PagesController@getWelcome');
Route::get('/pilih-presensi-acara', 'AdminBerita\PagesController@getPilihPresensiAcara');

Route::get('/messages', 'AdminBerita\MessagesController@getMessages');
Route::get('/daftar-acara', 'AdminBerita\AcaraController@getDaftarAcara');
Route::get('/tambah-subacara', 'AdminBerita\AcaraController@getForSubAcaras');
Route::get('daftar-subacara', 'AdminBerita\KelasAcaraController@getForSubAcara');
Route::get('/daftar-peserta/{kelas_acara_id}','AdminBerita\DataPesertaController@getDaftarPesertaKelas')->name('peserta.kelas');
Route::get('/data-peserta/{nik}','AdminBerita\UmatController@getForDataPesertaKelas')->name('datapeserta.kelas');

Route::get('/download-presensi/{kelas_acara_id}', 'AdminBerita\PresensiController@downloadPDF');


/*
Deleting Data
*/
Route::post('/delete', 'AdminBerita\AcaraController@delete');
Route::post('daftar-subacara/delete', 'AdminBerita\KelasAcaraController@delete');
Route::post('/daftar-peserta/delete', 'AdminBerita\DataPesertaController@delete');

/*
Olah Data
*/
Route::post('/tambah-subacara/submit','AdminBerita\KelasAcaraController@submit');
Route::post('/tambah-acara/submit', 'AdminBerita\AcaraController@submit');
Route::post('/input-peserta/submit','AdminBerita\DataPesertaController@submit');
Route::post('/pilih-presensi-acara/presensi', 'AdminBerita\PresensiController@terimaIdKelas');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home2');
