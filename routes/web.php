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
use Illuminate\Support\Facades\Route;

Route::get('admin', 'LoginController@checkLogin');
Route::get('', function () {
    return view('face_recognitions.index');
});
Route::post('admin/login', 'LoginController@login');
Route::get('admin/logout', 'LoginController@logout');

Route::get('admin/login', function () {
    return view('login');
})->name('login');

Route::group(['middleware' => ['auth']], function() {
    Route::get('admin/dashboard', 'DashboardController@index');

	//super admin
    // Route::group(['middleware' => ['roles:1']], function() {
		// *****************CRUD Users********************
			Route::resource('admin/users', 'UserController');
			Route::resource('admin/daftar-pegawai', 'DaftarPegawaiController');
			Route::resource('admin/data-barang', 'DatabarangController');
			Route::resource('admin/riwayat', 'RiwayatController');
	// });
});
