<?php

/*
	|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(array('prefix'=>'/'), function(){
	Route::get('/', 'PengusulController@getIndex')->name('pengusul_index');

	Route::get('register', 'PengusulController@getRegister')->name('pengusul_register');
	Route::post('register', 'PengusulController@postRegister')->name('pengusul_register_post');
	Route::get('login', 'PengusulController@getLogin')->name('pengusul_login');
	Route::post('login', 'PengusulController@postLogin')->name('pengusul_login_post');
	Route::get('logout', 'PengusulController@getLogout')->name('pengusul_logout');

	Route::get('beranda', 'PengusulController@getBeranda')->name('pengusul_beranda');
	Route::get('pengajuan-industri', 'PengusulController@getPengajuanDesainIndustri')->name('pengusul_desain_industri_pengajuan');
	Route::post('pengajuan-industri', 'PengusulController@postPengajuanDesainIndustri')->name('pengusul_desain_industri_pengajuan_post');
	Route::get('pengajuan-industri/1', 'PengusulController@getDetailDesainIndustri')->name('pengusul_desain_industri_detail');
	Route::get('pengajuan-paten/1', 'PengusulController@getDetailPaten')->name('pengusul_desain_industri_detail');
	Route::get('pengajuan-paten', 'PengusulController@getPengajuanPaten')->name('pengusul_paten_pengajuan');
	Route::post('pengajuan-paten', 'PengusulController@postPengajuanPaten')->name('pengusul_paten_pengajuan_post');
	Route::get('pengajuan', 'PengusulController@getPengajuan')->name('pengusul_pengajuan');
});

// Administrator
Route::get('/administrator', function() {
  	return view('admin.index');
})->name('admin_beranda');

Route::get('/administrator/pengajuanindustri', function() {
  	return view('admin.pengajuanindustri');
})->name('admin_desain_industri');

Route::get('/administrator/pengajuanpaten', function() {
  return view('admin.pengajuanpaten');
})->name('admin_paten');

Route::get('/administrator/pengajuanindustri/1', function() {
  	return view('admin.detailpengajuanindustri');
})->name('admin_desain_industri_detail');

Route::get('/administrator/pengajuanpaten/1', function() {
  return view('admin.detailpengajuanpaten');
})->name('admin_paten_detail');
