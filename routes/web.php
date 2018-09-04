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

Route::get('/', 'playersRegisterController@registerPlayers')->name('register');
Route::post('/', 'playersRegisterController@postPlayers')->name('upload_player');
Route::get('/roll', 'playersRollController@rolltime')->name('roll');
Route::get('/seleted', 'playersRollController@rollseleted')->name('seleted');
