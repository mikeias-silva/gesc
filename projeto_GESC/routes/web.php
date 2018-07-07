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

Route::get('/home', 'WelcomeController@index');

Route::get('/teste1',function(){
	return "<h1>Teste push</h1>";
});

Route::get('/cras', 'CrasController@listaCras');
