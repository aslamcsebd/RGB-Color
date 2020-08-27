<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::post('rgb', 'HomeController@RGB')->name('home');
Route::post('fixed_RGB', 'HomeController@fixed_RGB')->name('home');

