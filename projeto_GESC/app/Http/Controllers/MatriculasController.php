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

        //endereço para matricula
        $cep = Request::input('cep');
        $bairro = Request::input('bairro');
        $logradouro = Request::input('logradouro');
        $complemento = Request::input('complemento');
        
        

        $nomecrianca = Request::input('nomecrianca');
        $datanascimentocrianca = Request::input('datanascimentocrianca');
        $sexocrianca = Request::input('sexocrianca');
        $statusmatricula = Request::input('statusmatricula');
        $rgcrianca = Request::input('rgcrianca');
        $cpfcrianca = Request::input('cpfcrianca');
        
       /* $pessoacrianca = new Pessoa(
           $nomecrianca, $datanascimentocrianca, $sexocrianca,
           $rgcrianca, $cpfcrianca, $cep, $bairro, $logradouro, $complemento
        );
        $pessoacrianca->save();*/
     
        DB::insert('insert into pessoa(nomepessoa, datanascimento, sexo, rg, cpf, cep, bairro, logradouro, complementoendereco)
         values(?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($nomecrianca, $datanascimentocrianca, $sexocrianca, $rgcrianca, $cpfcrianca, $cep, $bairro,
                $logradouro, $complemento));


       
       //criança
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

        //-------------------------------
         	
        //--------------------------------------------------
        //responsavel 01
        $nomeresp1 = Request::input('nomeresp1');	
        $sexoresp1 = Request::input('sexoresp1');	
        $datanascimentoresp1 = Request::input('datanascimentoresp1');
        $rgresp1 = Request::input('rgresp1');
        $cpfresp1 = Request::input('cpfresp1');	
        
        DB::insert('insert into pessoa(nomepessoa, datanascimento, sexo, rg, cpf, cep, bairro, logradouro, complementoendereco)
        values(?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($nomeresp1, $datanascimentoresp1,  $sexoresp1, $rgresp1, $cpfresp1, $cep, $bairro, $logradouro, $complemento));

        
        $estadocivilresp1 = Request::input('estadocivilresp1');	
        $profissaoresp1 = Request::input('profissaoresp1');	
        $salarioresp1 = Request::input('salarioresp1');
        $trabalhoresp1 = Request::input('trabalhoresp1');	
        $escolaridaderesp1 = Request::input('escolaridaderesp1');	
        $tel1resp1 = Request::input('tel1resp1');	
        $tel2resp1 = Request::input('tel2resp1');
        $obsresp1 = Request::input('obsresp1');

        DB::insert('insert into responsavel(estadocivil, localtrabalho, telefone, telefone2, escolaridade, profissao,
        salario, outrasobs) values(?, ?, ?, ?, ?, ?, ?, ?)',
        array($escolaridaderesp1, $profissaoresp1, $salarioresp1, $trabalhoresp1, $escolaridaderesp1, $tel1resp1, $tel2resp1, $obsresp1));
        //------------------------------------------------------

        //--------------------------------------------------
        //responsavel 02
        $nomeresp2 = Request::input('nomeresp2');	
        $sexoresp2 = Request::input('sexoresp2');	
        $datanascimentoresp2 = Request::input('datanascimentoresp2');
        $rgresp2 = Request::input('rgresp2');
        $cpfresp2 = Request::input('cpfresp2');	
        
        DB::insert('insert into pessoa(nomepessoa, datanascimento, sexo, rg, cpf, cep, bairro, logradouro, complementoendereco)
        values(?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($nomeresp2, $datanascimentoresp2, $sexoresp2, $rgresp2, $cpfresp2, $cep, $bairro, $logradouro, $complemento));

        
        $estadocivilresp2 = Request::input('estadocivilresp2');	
        $profissaoresp2 = Request::input('profissaoresp2');	
        $salarioresp2 = Request::input('salarioresp2');
        $trabalhoresp2 = Request::input('trabalhoresp2');	
        $escolaridaderesp2 = Request::input('escolaridaderesp2');	
        $tel1resp2 = Request::input('tel1resp2');	
        $tel2resp2 = Request::input('tel2resp2');
        $obsresp2 = Request::input('obsresp2');

        DB::insert('insert into responsavel(estadocivil, localtrabalho, telefone, telefone2, escolaridade, profissao,
        salario, outrasobs) values(?, ?, ?, ?, ?, ?, ?, ?)',
        array($escolaridaderesp2, $profissaoresp2, $salarioresp2, $trabalhoresp2, 
        $escolaridaderesp2, $tel1resp2, $tel2resp2, $obsresp2));
        //------------------------------------------------------

        //---------------------------------------------
        //membro familia
        //-------------

        //familia
        $moradia = Request::input('moradia');
        $arearisco = Request::input('arearisco');
        $tipohabitacao = Request::input('tipohabitacao');
        $numnis = Request::input('numnis');
        $beneficiopc = Request::input('beneficiopc');
        $bolsafamilia = Request::input('bolsafamilia');
        $cras = Request::input('cras');
       // $membrofamilia
        // $rendapercapta
        //
        
        DB::insert('insert into familia(moradia, arearisco, tipohabitacao, numnis, beneficiopc, bolsafamilia, idcras)
        values(?, ?, ?, ?, ?, ?, ?)',
        array($moradia, $arearisco, $tipohabitacao, $numnis, $beneficiopc, $bolsafamilia, $cras));
        //---------------------------------------------------

        
        return redirect()->action('MatriculasController@listaMatriculas');
     }

/*
     public funcion mostraEscolas(){
        $escola = escola::all();

        return with('escola', $escola);
     }*/
}
