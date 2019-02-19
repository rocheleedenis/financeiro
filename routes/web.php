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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'contas.', 'prefix' => 'contas'], function () {
    Route::post('/update', ['as' => 'update', 'uses' => 'ContasController@update']);
    Route::get('/', ['as' => 'index', 'uses' => 'ContasController@index']);
    Route::post('/', ['as' => 'store', 'uses' => 'ContasController@store']);
});
