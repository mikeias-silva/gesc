<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Responsavel;

use App\Escola;

use App\Pessoa;


use Illuminate\Support\Facades\DB;


class CriancaController extends Controller
{
    public function adicionaCrianca(){

            
        //---------------------------------------------

        $idresponsaveis = Request::input('idresponsavel');

        $idresponsavel1 = $idresponsaveis[0];
        $idresponsavel2 = $idresponsaveis[1];

        //return $idresponsavel1;

       /* $nomecrianca = Request::input('nomecrianca');
        $datanascimentocrianca = Request::input('datanascimentocrianca');
        $sexocrianca = Request::input('sexocrianca');
        $statusmatricula = Request::input('statusmatricula');
        $rgcrianca = Request::input('rgcrianca');
        $cpfcrianca = Request::input('cpfcrianca');
        $cep = Request::input('cep');
        $bairro = 

        $pessoacrianca = new Pessoa();
        $pessoacrianca->nomepessoa = $nomecrianca;
        $pessoacrianca->datanascimento = $datanascimentocrianca;
        $pessoacrianca->rg = $rgcrianca;
        $pessoacrianca->cpf = $cpfcrianca;
        $pessoacrianca->sexo = $sexocrianca;
        $pessoacrianca->cep = $cep;
       // $pessoacrianca->bairro = $bairro;
       // $pessoacrianca->logradouro = $logradouro;
       // $pessoacrianca->complementoendereco = $complemento;
       // $pessoacrianca->save();
        
        /* DB::insert('insert into pessoa(nomepessoa, datanascimento, sexo, rg, cpf, cep, bairro, logradouro, complementoendereco)
            values(?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($nomecrianca, $datanascimentocrianca, $sexocrianca, $rgcrianca, $cpfcrianca, $cep, $bairro,
                $logradouro, $complemento));*/

                
        
        
        //criança
        /*  $idpublicoprioritario = Request::input('pprioritario');
        $idescola = Request::input('escola');
        $pprioritario = Request::input('pprioritario');
        $obssaude = Request::input('obssaude');
        $datacadastro = Carbon::now();
        $idpessoa = 1; */

     /*   $crianca = new Crianca();
        $crianca->obssaude = Request::input('obssaude');
        $crianca->datacadastro = $hoje;
        $crianca->idescola = Request::input('escola');;
        $crianca->idpublicoprioritario = Request::input('pprioritario');
        $crianca->idpessoa = $pessoacrianca->id;
        //$crianca->save();

        
        /*
        DB::insert('insert into crianca(obssaude, datacadastro, idpessoa, idescola, idpublicoprioritario) 
        values(?, ?, ?, ?, ?)',
        array($obssaude, $datacadastro, $idpessoa, $idescola, $idpublicoprioritario));

        //-------------------------------*
    */

      /*  $parentesco = new Parentesco();
        $parentesco->idcrianca = $crianca->idcrianca;
        $parentesco->idresponsavel = $idresponsavel1;
        //$parentesco->save();

        
        if (!empty($idresponsavel2)) {
            $parentesco = new Parentesco();
            $parentesco->idcrianca = $crianca->idcrianca;
            $parentesco->idresponsavel = $idresponsavel2;
            $parentesco->save();
        }
       */

        

        $dadosresponsaveis = DB::select('select * from parentes where idresponsavel = ?', [$idresponsaveis[0]]);

        $dados = [
            'idresponsavel1'=>$idresponsavel1,
            'idresponsavel2'=>$idresponsavel2,
            'dadosresponsaveis'=>$dadosresponsaveis
        ];

        return $dados;
        return view('matricula.cadastroCrianca', $dados);
    
    }
}
