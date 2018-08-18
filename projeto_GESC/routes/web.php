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
Route::get('/dashboard', 'DashboardController@painel');

//Rotas para a tela controle de CRAS
Route::get('/cras', 'CrasController@listaCras');
Route::get('/modalCras','CrasController@novo');
Route::post('/cras/adiciona', 'CrasController@adiciona');
Route::post('/cras/remove', 'CrasController@remover');
Route::post('/cras/edita', 'CrasController@editar');
Route::post('/cras/ativar', 'CrasController@ativar');
Route::post('/cras/inativar', 'CrasController@inativar');


//Rotas para as telas de controle de Turmas
Route::get('/turmas', 'TurmaController@listaTurma');
Route::post('/turmas/adiciona', 'TurmaController@adiciona');
Route::post('/turmas/remove', 'TurmaController@remover');
Route::post('/turmas/edita', 'TurmaController@editar');
Route::post('/turmas/inativa', 'TurmaController@inativar');
Route::post('/turmas/ativa', 'TurmaController@ativar');

//Rotas para as telas de instituição
Route::get('/instituicao', 'InstituicaoController@mostraInstituicao');
Route::post('/instituicao/edita', 'InstituicaoController@editar');
Route::post('/instituicao/diasFuncionamento', 'InstituicaoController@difinirDias');


//Rotas para as telas de Matrícula
Route::get('/matriculas', 'MatriculasController@listaMatriculas');
Route::get('/novaMatricula', 'MatriculasController@novaMatricula');
Route::post('/novaMatricula/adiciona', 'MatriculasController@adicionaMatricula');
Route::get('/pdfmatricula', 'MatriculasController@imprime');

//Rotas para a tela controle de Usuarios
Route::get('/usuarios', 'UsuariosController@listaUsuarios');
Route::post('/usuarios/adiciona', 'UsuariosController@adiciona');
Route::post('/usuarios/edita', 'UsuariosController@edita');
Route::post('/usuarios/inativa', 'UsuariosController@inativa');
Route::post('/usuarios/ativa', 'UsuariosController@ativa');

//Rotas para a tela de vagas
Route::get('/vagas', 'VagasController@listaVagas');
Route::post('/vagas/adiciona', 'VagasController@adiciona');
Route::post('/vagas/editar', 'VagasController@edita');
Route::post('/vagas/excluir', 'VagasController@exclui');

Route::get('/controle_frequencia', 'ControleFrequenciaController@listaTurmas');

//Route::get('/controle_frequencia/{idturma}/turma', 'ControleFrequenciaController@listaAlunos');
Route::get('/controle_frequencia/{idturma}/turma/{mes}', 'ControleFrequenciaController@listaAlunos');
Route::post('/lanca_frequencia', 'ControleFrequenciaController@lancaFrequancia');

Route::get('/transferencia_alunos', 'TransferenciaController@listaTurmasDois');
Route::get('/transferencia_alunos/{idturma}', 'TransferenciaController@listaAlunos');
Route::post('/efetua_transferencia', 'TransferenciaController@transfereAlunos');

/*
Route::get('/login', function(){
    return view('login.login');
});*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
