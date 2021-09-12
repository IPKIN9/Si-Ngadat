<?php

use Illuminate\Support\Facades\Route;

Route::get('login/', 'Auth\AuthController@index')->name('login');
Route::post('check/TouchUp', 'Auth\AuthController@check')->name('check');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('/', 'CMS\HomeController@index')->name('home.index');
        Route::get('hukumspecdata', 'CMS\HomeController@hukum');
        Route::post('pelanggar_post/', 'CMS\HomeController@create')->name('home.create');
        Route::get('detailspecdata/{id}', 'CMS\HomeController@detail');
        Route::post('pelanggar_edit', 'CMS\HomeController@update')->name('home.update');
        Route::delete('deletespecdata/{id}', 'CMS\HomeController@delete');
    });

    Route::prefix('Contoh')->group(function () {
        Route::get('index', 'Contoh\ContohController@index')->middleware('role:super_admin')->name('contoh.index');
        Route::post('create', 'Contoh\ContohController@create')->name('contoh.insert');
        Route::get('editspecdata/{id}', 'Contoh\ContohController@edit');
        Route::post('updatespecdata', 'Contoh\ContohController@update')->name('contoh.update');
        Route::delete('deletespecdata/{id}', 'Contoh\ContohController@delete');
    });

    Route::group(['prefix' => 'denda'], function () {
        Route::get('index', 'CMS\DendaController@index')->middleware('role:super_admin')->name('denda.index');
        Route::get('hukumspecdata', 'CMS\DendaController@hukum');
        Route::get('detailspecdata/{id}', 'CMS\DendaController@detail');
        Route::post('create', 'CMS\DendaController@create')->name('denda.insert');
        Route::get('editspecdata/{id}', 'CMS\DendaController@edit');
        Route::post('updatespecdata', 'CMS\DendaController@update')->name('denda.update');
        Route::delete('deletespecdata/{id}', 'CMS\DendaController@delete');
    });

    Route::group(['prefix' => 'desa'], function () {
        Route::get('index', 'CMS\DesaController@index')->middleware('role:super_admin')->name('desa.index');
        Route::post('create', 'CMS\DesaController@create')->name('desa.insert');
        Route::get('editspecdata/{id}', 'CMS\DesaController@edit');
        Route::post('updatespecdata', 'CMS\DesaController@update')->name('desa.update');
        Route::delete('deletespecdata/{id}', 'CMS\DesaController@delete');
    });
    
    Route::group(['prefix' => 'tentangkami'], function() {
        Route::get('index', 'CMS\TentangKamiController@index')->middleware('role:super_admin')->name('tentangkami.index');
        Route::post('create', 'CMS\TentangKamiController@create')->name('tentangkami.insert');
        Route::get('editspecdata/{id}', 'CMS\TentangKamiController@edit');
        Route::post('updatespecdata', 'CMS\TentangKamiController@update')->name('tentangkami.update');
        Route::delete('deletespecdata/{id}', 'CMS\TentangKamiController@delete');
    });
    

    Route::group(['prefix' => 'hukum'], function () {
        Route::get('index', 'CMS\HukumController@index')->middleware('role:super_admin')->name('hukum.index');
        Route::post('create', 'CMS\HukumController@create')->name('hukum.insert');
        Route::get('editspecdata/{id}', 'CMS\HukumController@edit');
        Route::post('updatespecdata', 'CMS\HukumController@update')->name('hukum.update');
        Route::delete('deletespecdata/{id}', 'CMS\HukumController@delete');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('index', 'Auth\UserController@index')->middleware('role:super_admin')->name('user.index');
        Route::post('create', 'Auth\UserController@create')->name('user.insert');
        Route::get('editspecdata/{id}', 'Auth\UserController@edit');
        Route::post('updatespecdata', 'Auth\UserController@update')->name('user.update');
        Route::delete('deletespecdata/{id}', 'Auth\UserController@delete');
    });
});
