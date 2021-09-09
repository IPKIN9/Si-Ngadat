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

Route::group(['prefix' => 'denda'], function() {
    Route::get('index', 'CMS\DendaController@index')->name('denda.index');
    Route::post('create', 'CMS\DendaController@create')->name('denda.insert');
    Route::get('editspecdata/{id}', 'CMS\DendaController@edit');
    Route::post('updatespecdata', 'CMS\DendaController@update')->name('denda.update');
    Route::delete('deletespecdata/{id}', 'CMS\DendaController@delete');
});
