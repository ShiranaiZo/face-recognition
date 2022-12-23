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

Route::get('', 'LoginController@checkLogin');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', function () {
        return view('index');
    });

	//super admin
    Route::group(['middleware' => ['roles:1']], function() {
		// *****************CRUD Users********************
			Route::resource('users', 'UserController');
	});
});
