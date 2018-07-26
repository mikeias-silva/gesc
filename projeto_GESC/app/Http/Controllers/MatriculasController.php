<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Matricula;

use Request;


class MatriculasController extends Controller
{
    public function listaMatriculas(){

        //$matAtivas =  DB::select('select * from matricula where statuscadastro = 1');

        $matAtivas = DB::select('select * from matriculas');
        return view('matricula.matriculas')->with('matAtivas', $matAtivas);
    }

    public function novaMatricula(){

        return view('matricula.novaMatricula');
    }

    public function adicionaMatricula(){
        /*$nome = Request::input('nome');
        $telefone = Request::input('telefone');

        DB::insert('insert into cras(nomeCras, telefone) values(?, ?)',
        array($nome, $telefone));*/

        $nome = Request::input('nome');
        $datanascimento = Request::input('datanascimento');
        $sexo = Request::input('sexo');
     
        DB::insert('insert into pessoa(nomepessoa, datanascimento, sexo) values(?, ?, ?)',
        array($nome, $datanascimento, $sexo));


        return redirect()->action('MatriculasController@listaMatriculas');
    }
}
