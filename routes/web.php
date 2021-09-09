<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Base.Dashboard');
})->name('home.index');

Route::prefix('Contoh')->group(function () {
    Route::get('index', 'Contoh\ContohController@index')->name('contoh.index');
    Route::post('create', 'Contoh\ContohController@create')->name('contoh.insert');
    Route::get('editspecdata/{id}', 'Contoh\ContohController@edit');
    Route::post('updatespecdata', 'Contoh\ContohController@update')->name('contoh.update');
    Route::delete('deletespecdata/{id}', 'Contoh\ContohController@delete');
});
