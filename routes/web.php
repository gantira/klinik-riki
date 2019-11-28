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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware'=> 'auth'], function () {

    Route::resource('/users', 'Admin\UserController');
	Route::resource('/roles', 'Admin\RoleController');
	Route::resource('/permissions', 'Admin\PermissionController');
	
});

Route::group(['middleware'=> 'auth'], function () {
	Route::resource('/dashboard', 'DashboardController');
	Route::resource('/pasien', 'PasienController');
	Route::get('/pasien/{pasien}/kartupasien', 'PasienController@kartupasien')->name('kartupasien');
	Route::resource('/rekamedis', 'RekamedisController');
	Route::resource('/dokter', 'DokterController');
	Route::resource('/bidan', 'BidanController');
	Route::resource('/obat', 'ObatController');
	Route::get('/addstockobat', 'ObatController@addstockobat')->name('addstockobat');
	Route::post('/addstockobat', 'ObatController@storeaddstockobat')->name('storeaddstockobat');
	Route::resource('/tindakan', 'TindakanController');
	Route::resource('/alkes', 'AlkesController');
	Route::get('/addstockalkes', 'AlkesController@addstockalkes')->name('addstockalkes');
	Route::post('/addstockalkes', 'AlkesController@storeaddstockalkes')->name('storeaddstockalkes');
	Route::resource('/pendaftaran', 'PendaftaranController');
	Route::resource('/transaksi', 'TransaksiController');
	Route::patch('/transaksi/{transaksi}/paid', 'TransaksiController@paid')->name('paid');
	Route::resource('/transaksiObat', 'TransaksiObatController');
	Route::resource('/transaksiTindakan', 'TransaksiTindakanController');
	Route::resource('/transaksiKamar', 'TransaksiKamarController');
	Route::resource('/diagnosa', 'DiagnosaController');
	Route::resource('/rujukan', 'RujukanController');
	Route::resource('/setting', 'SettingController');
	Route::resource('/report', 'ReportController');
	Route::resource('/resep', 'ResepController');
	Route::get('/report/{id}/resepobat', 'ReportController@resepobat')->name('resepobat');
	Route::resource('/kamar', 'KamarController');
	Route::resource('/antrian', 'AntrianController')->middleware('role:bidan');
	Route::get('/laporan/transaksi', 'LaporanController@laporanTransaksi')->name('laporanTransaksi');
	Route::get('/cetak/transaksi', 'ReportController@cetakTransaksi')->name('cetakTransaksi');
	Route::get('/laporan/obat', 'LaporanController@laporanObat')->name('laporanObat');
	Route::get('/cetak/obat', 'ReportController@cetakObat')->name('cetakObat');
	
});

