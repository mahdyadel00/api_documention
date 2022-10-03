<?php


Route::get('/', function () {
    return view('layouts.index');
});


Route::post('/', 'frontEnd\IndexController@store')->name('index.user.store');