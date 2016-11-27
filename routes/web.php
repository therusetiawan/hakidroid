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

Route::get('/', function () {
    return view('user.index');
});

Route::get('/login', function(){
  return view('layouts.loginlayout');
});
Route::get('/beranda', function(){
  return view('user.beranda');
});

Route::get('/ajuan', function(){
  return view('user.daftarusulan');
});

Route::get('/ajuan/desainindustri', function(){
  return view('user.detailpengajuanindustri');
});

Route::get('/ajuan/paten', function(){
  return view('user.detailpengajuanpaten');
});



Route::get('/pengajuanindustri', function(){
  return view('user.pengajuandesainindustri');
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
