<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Responsavel;

use App\Escola;

use App\Pessoa;

use App\Parentesco;

use App\PublicoPrioritario;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

use App\Crianca;

use App\Vaga;

use App\Matricula;

use App\Historico_Matricula;

use App\Turma;

class CriancaController extends Controller
{
    public function cadastroCrianca(){
        $escolas = Escola::all();
        $idresponsaveis = Request::input('idresponsavel');

        $idresponsavel1 = Request::input('idresponsavel1');
        $idresponsavel2 = Request::input('idresponsavel2');
        $nomepessoa = Request::input('nomeresp1');
        
        $pprioritario = PublicoPrioritario::all();
        $cep = Request::input('cep');
        $bairro = Request::input('bairro');
        $logradouro = Request::input('logradouro');
        $complemento = Request::input('complementoendereco');
        $ncasa = Request::input('ncasa');
       
       /* $dados = [
            'idresponsavel'=>$idresponsaveis,
            'escolas'=>$escolas,
            'pprioritario'=>$pprioritario,
            ''
        ];*/
        $escolas = Escola::all();
        $dados = [
            'responsaveis'=>$idresponsaveis,
            'cep'=>$cep,
            'bairro'=>$bairro,
            'logradouro'=>$logradouro,
            'ncasa'=>$ncasa,
            'complemento'=>$complemento,
            'idresponsavel1'=>$idresponsavel1,
            'idresponsavel2'=>$idresponsavel2,
            'escolas'=>$escolas,
            'pprioritario'=>$pprioritario,
        ];

        
        return view('matricula.cadastroCrianca', $dados);
    }



    public function adicionaCrianca(){

            
        //---------------------------------------------
       // return Request::all();
        $idresponsaveis = Request::input('idresponsavel');

        $idresponsavel1 = Request::input('idresponsavel1');
        $idresponsavel2 = Request::input('idresponsavel2');

      //  return $idresponsavel2;

        $nomecrianca = Request::input('nomecrianca');
        $datanascimentocrianca = Request::input('datanascimentocrianca');
        $sexocrianca = Request::input('sexocrianca');
        $statusmatricula = Request::input('statusmatricula');
        $rgcrianca = Request::input('rgcrianca');
        $cpfcrianca = Request::input('cpfcrianca');
        $cep = Request::input('cep');
        $bairro = Request::input('bairro');
        $logradouro = Request::input('logradouro');
        $complemento = Request::input('complementoendereco');

        $pessoacrianca = new Pessoa();
        $pessoacrianca->nomepessoa = $nomecrianca;
        $pessoacrianca->datanascimento = $datanascimentocrianca;
        $pessoacrianca->rg = $rgcrianca;
        $pessoacrianca->cpf = $cpfcrianca;
        $pessoacrianca->sexo = $sexocrianca;
        $pessoacrianca->cep = $cep;
        $pessoacrianca->bairro = $bairro;
        $pessoacrianca->logradouro = $logradouro;
        $pessoacrianca->complementoendereco = $complemento;
        $pessoacrianca->save();
        
        /* DB::insert('insert into pessoa(nomepessoa, datanascimento, sexo, rg, cpf, cep, bairro, logradouro, complementoendereco)
            values(?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($nomecrianca, $datanascimentocrianca, $sexocrianca, $rgcrianca, $cpfcrianca, $cep, $bairro,
                $logradouro, $complemento));*/

                
        
        
        //criança
        $idpublicoprioritario = Request::input('pprioritario');
        $idescola = Request::input('escola');
        $pprioritario = Request::input('pprioritario');
        $obssaude = Request::input('obssaude');
        $hoje = Carbon::now();
      //  $idpessoa = 1; 

        $crianca = new Crianca();
        $crianca->obssaude = Request::input('obssaude');
        $crianca->datacadastro = $hoje;
        $crianca->idescola = Request::input('escola');;
        $crianca->idpublicoprioritario = Request::input('pprioritario');
        $crianca->idpessoa = $pessoacrianca->id;
        $crianca->save();

        
        /*
        DB::insert('insert into crianca(obssaude, datacadastro, idpessoa, idescola, idpublicoprioritario) 
        values(?, ?, ?, ?, ?)',
        array($obssaude, $datacadastro, $idpessoa, $idescola, $idpublicoprioritario));

        //-------------------------------*
    */

        $parentesco = new Parentesco();
        $parentesco->idcrianca = $crianca->idcrianca;
        $parentesco->idresponsavel = $idresponsavel1;
        //$parentesco->save();

        
        if (!empty($idresponsavel2)) {
            $parentesco = new Parentesco();
            $parentesco->idcrianca = $crianca->idcrianca;
            $parentesco->idresponsavel = $idresponsavel2;
            $parentesco->save();
        }
       

        //-----------------------------------
        //MATRICULA
        
        $dataespera = Carbon::now();
        // $datasairespera;

        $idade = $hoje->diffInYears($datanascimentocrianca);
        
        //$vagas = DB::select('select * from vagas where ? >= idademin and ? <= idademax', [$idade, $idade]); 
        $vagas = Vaga::vagaMatricula();
        //return  $vagas;
        //lógica para pegar vaga de acordo com a idade da criança
        foreach($vagas as $vaga){
            if($vaga->idademin <= $idade and $vaga->idademax >= $idade){
                $idademin = $vaga->idademin;
                $idademax = $vaga->idademax; 
               
                $essavaga = $vaga->idvaga;
                $essanumvaga = $vaga->numvaga;
            }
            
        }

        $pessoas = Pessoa::all();
        $criancas = Crianca::all();

        foreach($pessoas as $pessoa){
            foreach($criancas as $crianca){
                if($pessoa->idpessoa == $crianca->idpessoa){
                    // return $pessoa->datanascimento;    
                }
            }
            
        }
        

        $anomatricula = Carbon::now();
        $idturma = Request::input('turma');

        $matricula = new Matricula();
        
        $matricula->anomatricula = $hoje;
        $matricula->idvaga = $essavaga;
        
        $matricula->serieescolar = Request::input('serie');
        $matricula->idcrianca = $crianca->idcrianca;;
        
        $matAtivas = Matricula::where('statuscadastro', 'Ativo')->where('idvaga', $essavaga)->sum('statuscadastro');
        // $matAtivas = Matricula::where('idvaga', $vaga->idvaga);
        
        $historico_matricula = new Historico_matricula();

        if($matAtivas < $essanumvaga){
            $matricula->statuscadastro = 'Ativo';
            $historico_matricula->dataativacao = $hoje;
            
        }elseif($matAtivas >= $essanumvaga){
            $matricula->statuscadastro = 'Espera';
            $matricula->dataespera = $hoje;
                
        }
        
        
        //return $matricula;
        $matricula->save();
        
        
    /*
        DB::insert('insert into Matricula(datasairespera, satuscadastro, dataespera, serieescolar, 
        anomatricula, idturma, idvaga, idcrianca)
        values(?, ?, ?, ?, ?, ?, ?, ?)',
        array(, , , , , , ,));

    */
        //return $idade;

        if($matricula->statuscadastro == 'Espera'){

            return redirect()->action('MatriculasController@listaMatriculas');
        }else{
            $historico_matricula->idmatricula = $matricula->idmatricula;
            $historico_matricula->save(); 
            
            $turmas = Turma::all();
            return view('matricula.modalTurma')->with('turmas', $turmas)->with('nomecrianca',
            $nomecrianca)->with('idmatricula', $matricula->idmatricula);
        }
        

    /*    $dadosresponsaveis = DB::select('select * from parentes where idresponsavel = ?', [$idresponsaveis[0]]);

        $dados = [
            'idresponsavel1'=>$idresponsavel1,
            'idresponsavel2'=>$idresponsavel2,
            'dadosresponsaveis'=>$dadosresponsaveis
        ];

        //return $dados;
        return redirect()->action('MatriculasController@adicionaMatricula')
        ->with('idcrianca', 1);
    */
    }
}
