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
	Route::get('login', 'PengusulController@getLogin')->name('pengusul_login');
	Route::post('login', 'PengusulController@postLogin')->name('pengusul_login_post');
	Route::get('beranda', 'PengusulController@getBeranda')->name('pengusul_beranda');
	Route::get('pengajuan-industri', 'PengusulController@getPengajuanDesainIndustri')->name('pengusul_desain_industri_pengajuan');
	Route::post('pengajuan-industri', 'PengusulController@postPengajuanDesainIndustri')->name('pengusul_desain_industri_pengajuan_post');
});
Route::get('/pengajuanpaten', function(){
  return view('user.pengajuanpaten');
});
// Administrator
Route::get('/administrator', function() {
  	return view('admin.index');
});

Route::get('/administrator/pengajuanindustri', function() {
  	return view('admin.pengajuanindustri');
});

Route::get('/administrator/pengajuanpaten', function() {
  return view('admin.pengajuanpaten');
});

Route::get('/administrator/pengajuanindustri/1', function() {
  	return view('admin.detailpengajuanindustri');
});

Route::get('/administrator/pengajuanpaten/1', function() {
  return view('admin.detailpengajuanpaten');
});
