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
    return view('welcome');
});
Route::get('/login', function(){
  return view('layouts.loginlayout');
});
Route::get('/beranda', function(){
  return view('layouts.userlayout');
});

Route::get('/pengajuanindustri', function(){
  return view('user.pengajuandesainindustri');
});
