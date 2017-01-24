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
	Route::get('pengajuan-paten/{id}', 'PengusulController@getDetailPaten')->name('pengusul_desain_industri_detail');
	Route::get('pengajuan-paten', 'PengusulController@getPengajuanPaten')->name('pengusul_paten_pengajuan');
	Route::post('pengajuan-paten', 'PengusulController@postPengajuanPaten')->name('pengusul_paten_pengajuan_post');
	Route::get('pengajuan', 'PengusulController@getPengajuan')->name('pengusul_pengajuan');
});

Route::group(array('prefix'=>'download'), function(){
	Route::get('paten/surat-kuasa/{{filename}}', 'DownloadController@getPatenSuratKuasa');
	Route::get('paten/surat-pengalihan-hak-penemuan/{filename}', 'DownloadController@getPatenSuratPengalihanHakPenemaun');
	Route::get('paten/surat-kepemilikan-inventor/{filename}', 'DownloadController@getPatenSuratKepemilikanInventor');
	Route::get('paten/surat-kepemilikan-lembaga/{filename}', 'DownloadController@getPatenSuratkepemilikanLembaga');

	Route::get('paten/dokumen-subtantif-deskripsi/{filename}', 'DownloadController@getPatenDokumenSubtantifDeskripsi');
	Route::get('paten/dokumen-subtantif-gambar/{filename}', 'DownloadController@getPatenDokumenSubtantifGambar');

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


// Route list for admin by herusetiawan

Route::get('administrator', function () {
    return redirect()->route('admin.getLogin');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('login', 'AuthController@showLogin')->name('getLogin');
    Route::post('login', 'AuthController@postLogin')->name('postLogin');
    Route::get('logout', 'AuthController@getLogout')->name('getLogout');

    Route::group(['middleware' => 'auth:web'], function () {
	   
        Route::get('home', 'HomeController@index')->name('home');
        Route::resource('desainindustri', 'DesainIndustriController', ['except' => ['create', 'store']]);
        Route::resource('paten', 'PatenController', ['except' => ['create', 'show', 'store']]);
	});
});

// End route list for admin by heru setiawan