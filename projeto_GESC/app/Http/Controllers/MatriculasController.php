<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Matricula;
use App\Cras;

use App\Escola;

use App\Pessoa;

use App\PublicoPrioritario;

use App\Responsavel;

use App\Familia;

use App\Crianca;

use Request;

use Illuminate\Support\Carbon;
use Illuminate\Database\MySqlConnection;



class MatriculasController extends Controller
{
    public function listaMatriculas(){

        //$matAtivas =  DB::select('select * from matricula where statuscadastro = 1');

        $matAtivas = DB::select('select * from matriculas');
       
        return view('matricula.matriculas')->with('matAtivas', $matAtivas);
    }

    public function novaMatricula(){

        $cras = cras::all();
        $escola = escola::all();
        $pprioritario = PublicoPrioritario::all();
        return view('matricula.novaMatricula')->with('cras', $cras)->with('escola', $escola)
        ->with('pprioritario', $pprioritario);
    }

    public function adicionaMatricula(Request $request){
        /*$nome = Request::input('nome');
        $telefone = Request::input('telefone');

        DB::insert('insert into cras(nomeCras, telefone) values(?, ?)',
        array($nome, $telefone));*/

        

        $nomecrianca = Request::input('nomecrianca');
        $datanascimentocrianca = Request::input('datanascimentocrianca');
        $sexocrianca = Request::input('sexocrianca');
        $statusmatricula = Request::input('statusmatricula');
        $rgcrianca = Request::input('rgcrianca');
        $cpfcrianca = Request::input('cpfcrianca');
        $cep = Request::input('cep');
        $bairro = Request::input('bairro');
        $logradouro = Request::input('logradouro');
        $complemento = Request::input('complemento');
        
       /* $pessoacrianca = new Pessoa(
           $nomecrianca, $datanascimentocrianca, $sexocrianca,
           $rgcrianca, $cpfcrianca, $cep, $bairro, $logradouro, $complemento
        );
        $pessoacrianca->save();*/
     
        DB::insert('insert into pessoa(nomepessoa, datanascimento, sexo, rg, cpf, cep, bairro, logradouro, complementoendereco)
         values(?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($nomecrianca, $datanascimentocrianca, $sexocrianca, $rgcrianca, $cpfcrianca, $cep, $bairro,
                $logradouro, $complemento));


       
       
        $idpublicoprioritario = Request::input('pprioritario');
        
        $idescola = Request::input('escola');
        $pprioritario = Request::input('pprioritario');
        $obssaude = Request::input('obssaude');
        $datacadastro = Carbon::now();
        $idpessoa = 1; 

        /*$crianca = new Crianca(
            $escola, $pprioritario, $obssaude, $datacadastro, $idpessoa
        );
        $crianca->save();*/

        DB::insert('insert into crianca(obssaude, datacadastro, idpessoa, idescola, idpublicoprioritario) 
        values(?, ?, ?, ?, ?)',
        array($obssaude, $datacadastro, $idpessoa, $idescola, $idpublicoprioritario));

        return redirect()->action('MatriculasController@listaMatriculas');
     }
/*
     public funcion mostraEscolas(){
        $escola = escola::all();

        return with('escola', $escola);
     }*/
}
