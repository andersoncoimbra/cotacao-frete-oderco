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

Route::get('/index','CotacaoController@index');
Route::get('/cotacao','CotacaoController@cotacoes')->name('cotacoes');
Route::post('/cotacao','CotacaoController@store')->name('cotacoes.store');


Route::put('/cotacao', 'CotacaoController@update')->name('cotacoes.cotar');
