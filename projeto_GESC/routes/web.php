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


Route::get('/dashboard', 'DashboardController@painel')->middleware('auth');

//Rotas para a tela controle de CRAS
Route::get('/cras', 'CrasController@listaCras')->middleware('auth');
Route::get('/modalCras','CrasController@novo')->middleware('auth');
Route::post('/cras/adiciona', 'CrasController@adiciona')->middleware('auth');
Route::post('/cras/remove', 'CrasController@remover')->middleware('auth');
Route::post('/cras/edita', 'CrasController@editar')->middleware('auth');
Route::post('/cras/ativar', 'CrasController@ativar')->middleware('auth');
Route::post('/cras/inativar', 'CrasController@inativar')->middleware('auth');


//Rotas para as telas de controle de Turmas
Route::get('/turmas', 'TurmaController@listaTurma')->middleware('auth');
Route::post('/turmas/adiciona', 'TurmaController@adiciona')->middleware('auth');
Route::post('/turmas/remove', 'TurmaController@remover')->middleware('auth');
Route::post('/turmas/edita', 'TurmaController@editar')->middleware('auth');
Route::post('/turmas/inativa', 'TurmaController@inativar')->middleware('auth');
Route::post('/turmas/ativa', 'TurmaController@ativar')->middleware('auth');

//Rotas para as telas de instituição
Route::get('/instituicao', 'InstituicaoController@mostraInstituicao')->middleware('auth');
Route::post('/instituicao/edita', 'InstituicaoController@editar')->middleware('auth');
Route::post('/instituicao/diasFuncionamento', 'InstituicaoController@difinirDias')->middleware('auth');

//Rotas para as telas de Responsaveis
Route::get('/listagemResponsaveis', 'ResponsavelController@responsaveis')->middleware('auth');
Route::get('/responsavel', 'ResponsavelController@novoResponsavel')->middleware('auth');
Route::post('/adicionaResponsavel', 'ResponsavelController@adicionaResponsavel')->middleware('auth');

//Rotas para as telas de criança
Route::post('/crianca', 'CriancaController@cadastroCrianca')->middleware('auth');
Route::post('/adicionaCrianca', 'CriancaController@adicionaCrianca')->middleware('auth');


//Rotas para as telas de Matrícula  
Route::get('/listagemMatriculas', 'MatriculasController@listaMatriculas')->middleware('auth');
Route::get('/listagemMatriculas/anteriores', 'MatriculasController@selecionaAno')->middleware('auth');
Route::get('/listagemMatriculas/rematriculas', 'MatriculasController@precisamRematricular')->middleware('auth');
Route::post('/matriculasAnteriores', 'MatriculasController@matriculasAnteriores')->middleware('auth');

Route::get('/novaMatricula', 'MatriculasController@novaMatricula')->middleware('auth');
//Route::post('/novaMatricula/adiciona', 'MatriculasController@adicionaMatricula')->middleware('auth');
Route::get('/imprimematricula', 'MatriculasController@imprime')->middleware('auth');
Route::post('/inativarMatricula', 'MatriculasController@inativaMatricula')->middleware('auth');
Route::post('/ativarMatricula', 'MatriculasController@reativarMatricula')->middleware('auth');
Route::post('/turmaMatricula', 'MatriculasController@matriculaEmTurma')->middleware('auth');
Route::post('/associaturma', 'MatriculasController@turmaVazia')->middleware('auth');
Route::get('/rematricula/{idmatricula}', 'MatriculasController@rematricula')->middleware('auth');
Route::get('/confirmarRematricula/{idmatricula}', 'MatriculasController@confirmarRematricula')->middleware('auth');
Route::post('/matricula', 'MatriculasController@adicionaMatricula')->middleware('auth');
Route::get('/matriculasAtuais', 'MatriculasController@matriculasAtuais')->middleware('auth');



//Rotas para a tela controle de Usuarios
Route::get('/usuarios', 'UsuariosController@listaUsuarios');
Route::post('/usuarios/adiciona', 'UsuariosController@adiciona');
Route::post('/usuarios/edita', 'UsuariosController@edita');
Route::post('/usuarios/inativa', 'UsuariosController@inativa');
Route::post('/usuarios/ativa', 'UsuariosController@ativa');

//Rotas para a tela de vagas
Route::get('/vagas', 'VagasController@listaVagas')->middleware('auth');
Route::post('/vagas/adiciona', 'VagasController@adiciona')->middleware('auth');
Route::post('/vagas/editar', 'VagasController@edita')->middleware('auth');
Route::post('/vagas/excluir', 'VagasController@exclui')->middleware('auth');

Route::get('/controle_frequencia', 'ControleFrequenciaController@listaTurmas')->middleware('auth');

//Route::get('/controle_frequencia/{idturma}/turma', 'ControleFrequenciaController@listaAlunos');
Route::get('/controle_frequencia/{idturma}/turma/{mes}', 'ControleFrequenciaController@listaAlunos')->middleware('auth');
Route::post('/lanca_frequencia', 'ControleFrequenciaController@lancaFrequancia')->middleware('auth');

Route::get('/transferencia_alunos', 'TransferenciaController@listaTurmasDois')->middleware('auth');
Route::get('/transferencia_alunos/{idturma}', 'TransferenciaController@listaAlunos')->middleware('auth');
Route::post('/efetua_transferencia', 'TransferenciaController@transfereAlunos')->middleware('auth');

Route::get('/fichaFrequencia', 'FichaFrequenciaController@apresentaFichaFrequencia')->middleware('auth');

/*
Route::get('/login', function(){
    return view('login.login');
});*/
//Auth::routes();
Route::get('/login', 'LoginController@login')->name('login');
Route::get('/login2', 'LoginController@login2')->name('login');
Route::post('/login/autenticar', 'LoginController@tentativaLogin');
Route::get('/logout', 'LoginController@logout')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

