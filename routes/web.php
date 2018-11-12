<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/import_data','Admin\ImportController@getImport')->name('import_data');
    Route::post('/import_parse','Admin\ImportController@parseImport')->name('import_parse');

    Route::post('/import_process','Admin\ImportController@processImport')->name('import_match_process');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
