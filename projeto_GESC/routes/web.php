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
Route::get('/dashboard', function(){
    return view('dashboard.dashboard');
});

//Rotas para a tela controle de CRAS
Route::get('/cras', 'CrasController@listaCras');
Route::get('/modalCras','CrasController@novo');
Route::post('/cras/adiciona', 'CrasController@adiciona');
Route::post('/cras/remove', 'CrasController@remover');
Route::post('/cras/edita', 'CrasController@editar');


//Rotas para as telas de controle de Turmas
Route::get('/turmas', 'TurmaController@listaTurma');
Route::post('/turmas/adiciona', 'TurmaController@adiciona');
Route::post('/turmas/remove', 'TurmaController@remover');
Route::post('/turmas/edita', 'TurmaController@editar');

Route::get('/login', function(){
    return view('login.login');
});