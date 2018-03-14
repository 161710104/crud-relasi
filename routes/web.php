<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('kursus','KursusController');
Route::resource('anggota','AnggotaController');
Route::resource('formulir','FormulirController');

