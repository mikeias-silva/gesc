<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Matricula;
use App\Cras;

use App\Escola;

use App\Pessoa;

use App\PublicoPrioritario;

use App\Responsavel;

use App\Familia;

use App\Crianca;
use App\Turma;
use App\Vaga;
use App\Historico_Matricula;
use App\DadosMatricula;
use Request;
//use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Database\MySqlConnection;
use App\membro_familia;

use App\Parentesco;

use PDF;

class MatriculasController extends Controller
{

    
    public function listaMatriculas(){

        $ano = Carbon::now()->year;
       // $matAtivas =  DB::select('select * from matriculas where statuscadastro = ?', ['Ativo']);
        //dd($matAtivas);
      // $matAtivas = DB::select('select * from matriculas where statuscadastro = ?', ['Ativo']);

        //$matAtivas = Matricula::where('statuscadastro', 'ativo');

    //  return Matricula::crasMatricula();
      // $matAtivas = Matricula::matriculasAtiva();
     
        $matInativas = Matricula::matriculasInativas();
      //  $matEspera = Matricula::matriculasEspera();

        $matAtivas = Matricula::matriculasAtiva();
        $matEspera = Matricula::matriculasEspera();
       // $matInativas = DadosMatricula::matriculasInativas();
        $turmas = Turma::all();

        $vagas = Vaga::vagaMatricula();

        /*$matAtivas = Matricula::vagasMatriculas();
        return $matAtivas;*/
        return view('matricula.matriculas')->with('matAtivas', $matAtivas)->with('matInativas', $matInativas)
        ->with('matEspera', $matEspera)->with('turmas', $turmas)->with('ano', $ano)->with('vagas', $vagas);
       
      //return view('matricula.matriculas');
    }


    public function novaMatricula(){

        $cras = Cras::crasAtivos();
        $escola = escola::all();
        $pprioritario = PublicoPrioritario::all();
        $turmas  = Turma::all();
    return view('matricula.novaMatricula')->with('cras', $cras)->with('escola', $escola)
        ->with('pprioritario', $pprioritario)->with('turmas', $turmas);
    }

    public function selecionaAno(){
        $vagas = Vaga::vagasAnteriores();
        
        return view('matricula.anoMatricula')->with('vagas', $vagas);
    }

    public function matriculasAnteriores(){

        $anovaga = Request::input('anovaga');
       // return $anovaga;
        //$dadosmatriculas = DB::select('select * from dadosmatricula where anovaga = ?', [$anovaga]);


      //  $matAnteriores = Matricula::matriculasAnoAnterior($anovaga);

        $matAnteriores = DadosMatricula::matriculasAnoAnterior($anovaga);
       // $ano = Carbon::now()->year;
        //return $matAnteriores;
        return view('matricula.matriculasAnterior')->with('matAnteriores', $matAnteriores)
        ->with('ano', $anovaga);
    }

    public function matriculasSeguinte(){

        $anovaga = Carbon::now()->year;
       // return $anovaga;
        //$dadosmatriculas = DB::select('select * from dadosmatricula where anovaga = ?', [$anovaga]);


      //  $matAnteriores = Matricula::matriculasAnoAnterior($anovaga);

       return  $matSeguinte = DadosMatricula::matriculasAnoSeguinte();
       // $ano = Carbon::now()->year;
        //return $matAnteriores;
        return view('matricula.matriculasSeguintes')->with('matSeguinte', $matSeguinte)
        ->with('ano', $anovaga);
    }

   

    public function imprime(){
        $matAtivas = Matricula::matriculasAtiva();
        $matInativas = Matricula::matriculasInativas();
        $matEspera = Matricula::matriculasEspera();
        $hoje = Carbon::now()->year;
    

        $idmatricula = Request::input('idmatricula');


        $dadosmatricula = DB::select('select * from dadosmatricula where idmatricula = ?', array($idmatricula));

        foreach ($dadosmatricula as $dadosmt) {
            $dadosmt->idcrianca;
            $dadosmt->datamatricula;
            $dadosmt->serieescolar;
            $dadosmt->grupoconvivencia;
            $dadosmt->idmatricula;

        }

        $dadoscrianca = DB::select('select * from dadoscrianca where idcrianca = ?', [$dadosmt->idcrianca]);

        foreach ($dadoscrianca as $dadoscr) {
            $dadoscr->nomecrianca;
            $dadoscr->nascimentocrianca;
            $dadoscr->logradouro;
            $dadoscr->bairro;
            $dadoscr->ncasa;
            $dadoscr->complementoendereco;
            $dadoscr->cpfcrianca;
            $dadoscr->rgcrianca;
            $dadoscr->sexocrianca;
            $dadoscr->emissorcrianca;
            $dadoscr->idmatricula;
            $dadoscr->nomeescola;
        }


        $parentes = DB::select('select * from parentes where idcrianca = ? ', [$dadosmt->idcrianca]);
        
        foreach($parentes as $parente){
            $parente->nomeresponsavel;
        }

        //return ;

        $dadosfamilia = DB::select('select * from dadosfamilia where idfamilia = ?', [$parente->idfamilia]);
        
        foreach($dadosfamilia as $dadosfm){
            $dadosfm->idfamilia;
            $dadosfm->arearisco;
            $dadosfm->bolsafamilia;
            $dadosfm->moradia;
            $dadosfm->numnis;
            $dadosfm->tipohabitacao;
            $dadosfm->nomecras;
        }
        
        foreach($dadoscrianca as $dadoscrianca){
            $nascimentocrianca = Carbon::parse($dadoscrianca->nascimentocrianca)->format('d/m/y');
            $logradouro = $dadoscrianca->logradouro;
            $bairro = $dadoscrianca->bairro;
            $ncasa = $dadoscrianca->ncasa;
           
        
        }

        $cras = Cras::all();
        $pprioritario = PublicoPrioritario::all();
        $escola = Escola::all();
        //return $nomematricula;

        $ano = Carbon::now()->year;
        $dados = [
            'responsaveis'=>$parentes,
            'dadoscrianca'=>$dadoscrianca,
            'dadosfamilia'=>$dadosfamilia,
            'dadosmatricula'=>$dadosmatricula,
            'cras'=>$cras,
            'pprioritario'=>$pprioritario,
            'escola'=>$escola,
            'ano'=>$ano   
        ];

        //return $dadosmatricula;

        //return $dadosfamilia;
        
       
        return view('matricula.impressao', $dados);
    }

    public function adicionaMatricula(){

        //return Request::all();
      
        return $idcrianca;
        
        $hoje = Carbon::now();
        /*$nome = Request::input('nome');
        $telefone = Request::input('telefone');

        DB::insert('insert into cras(nomeCras, telefone) values(?, ?)',
        array($nome, $telefone));*/

        //endereço para matricula
        
        

        //-----------------------------------
        //MATRICULA
        
        $dataespera = Carbon::now();
        // $datasairespera;

        $idade = $hoje->diffInYears($datanascimentocrianca);
        
        //$vagas = DB::select('select * from vagas where ? >= idademin and ? <= idademax', [$idade, $idade]); 
        $vagas = Vaga::all();
        //return  $vagas;
        //lógica para pegar vaga de acordo com a idade da criança
        foreach($vagas as $vaga){
            if($vaga->idademin <= $idade and $vaga->idademax >= $idade){
                $idademin = $vaga->idademin;
                $idademax = $vaga->idademax; 
                $vaga->numvaga;
                $vaga->anovaga;
                $vaga->idvaga;
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
        
    }

    public function turmaVazia(){
        $idmatricula = Matricula::find(Request::input('idmatricula'));
        $turma = Request::input('idturma');
        
        //return Request::all();
        $idmatricula->update(['idturma'=> $turma]);

        return redirect()->action('MatriculasController@listaMatriculas');
    }
    
    public function matriculaEmTurma(){
        $newMatricula = Matricula::find(Request::input('idmatricula'));
        $turma = Request::input('idturma');

        $newMatricula->update(['idturma'=>$turma]);
        toastr()->Success('Adicionado com sucesso!');
        return redirect()->action('MatriculasController@listaMatriculas');
    }


    public function inativaMatricula(Request $request){
            $hoje = Carbon::now();

            $matricula = Matricula::find(
            Request::input('idmatricula'));

            $motivoinativacao = Request::input('motivoinativacao');
          
            $historico_matricula = DB::select('select * from historico_matricula 
            where idmatricula = ?', array($matricula->idmatricula));

            //return $historico_matricula;

            foreach ($historico_matricula as $ht) {
                if($ht->datainativacao == null){
                    $essehistorico = $ht->idhistoricomatricula;
                    $atualizahistorico = Historico_Matricula::find($essehistorico);
                    $atualizahistorico->update([
                        'datainativacao'=>$hoje,
                        'motivoinativacao'=>$motivoinativacao
                    ]);
                }
            }
           
            
            

            $matricula->update([
                'statuscadastro'=>'Inativo',
                'idturma'=>null]);


    
        return redirect()->action('MatriculasController@listaMatriculas');
    }

    public function reativarMatricula(Request $request){
            $hoje = Carbon::now();

            $matricula = Matricula::find(
                Request::input('idmatricula'));
            

        // $idadedessamatricula = Matricula::idadeMatricula($matricula);

            $matricula->update(['statuscadastro'=>'Ativo']);

            $historico_matricula = new Historico_Matricula();

            $historico_matricula->dataativacao = $hoje;
            $historico_matricula->idmatricula = Request::input('idmatricula');
            $historico_matricula->save();


        return back();
    }

    public function sairEspera(){

       
        $hoje = Carbon::now();

        $matricula = Matricula::find(
            Request::input('idmatricula'));

        $matricula->datasairespera = $hoje;

        $datanasci = DB::select('select datanascimento from nomeidadematricula where idmatricula = ?',
        array(Request::input('idmatricula')));

        $idade = $hoje->diffInYears($datanascimentocrianca);

        $vagas = Vaga::vagaMatricula();
        foreach($vagas as $vaga){
            if($vaga->idademin <= $idade and $vaga->idademax >= $idade){
                $idademin = $vaga->idademin;
                $idademax = $vaga->idademax; 
                $vaga->numvaga;
                $vaga->anovaga;
                $vaga->idvaga;
                $essavaga = $vaga->idvaga;
                $essanumvaga = $vaga->numvaga;
            
            }
            
        }

        $matAtivas = Matricula::where('statuscadastro', 'Ativo')->where('idvaga', $essavaga)->sum('statuscadastro');
       
        $historico_matricula = new Historico_Matricula();
        if($matAtivas < $essanumvaga){
            $matricula->statuscadastro = 'Ativo';
            $historico_matricula->dataativacao = $hoje;
            $matricula->update();
            
        }elseif($matAtivas >= $essanumvaga){
            return redirect()->action('MatriculasController@listaMatriculas');
                
        }


        


    }

    public function rematricula($idmatricula){

        //$idmatricula = Request::input('idmatricula');

       // return $idmatricula;

      // return $idmatricula;
        $dadosmatricula = DB::select('select * from dadosmatricula where idmatricula
        = ?', array($idmatricula));

        foreach ($dadosmatricula as $dadosmt) {
            $dadosmt->idcrianca;
            $dadosmt->datamatricula;
            $dadosmt->serieescolar;
            $dadosmt->grupoconvivencia;
            $dadosmt->idmatricula;

        }

        $dadoscrianca = DB::select('select * from dadoscrianca where idcrianca = ?', [$dadosmt->idcrianca]);

        foreach ($dadoscrianca as $dadoscr) {
            $dadoscr->nomecrianca;
            $dadoscr->nascimentocrianca;
            $dadoscr->logradouro;
            $dadoscr->bairro;
            $dadoscr->ncasa;
            $dadoscr->complementoendereco;
            $dadoscr->cpfcrianca;
            $dadoscr->rgcrianca;
            $dadoscr->sexocrianca;
            $dadoscr->emissorcrianca;
            $dadoscr->idmatricula;
            $dadoscr->nomeescola;
        }


        $parentes = DB::select('select * from parentes where idcrianca = ? ', [$dadosmt->idcrianca]);
        
        foreach($parentes as $parente){
            $parente->nomeresponsavel;
            $parente->idfamilia;
        }

        //return ;

        $dadosfamilia = DB::select('select * from dadosfamilia where idfamilia = ?', [$parente->idfamilia]);
        
        foreach($dadosfamilia as $dadosfm){
            $dadosfm->idfamilia;
            $dadosfm->arearisco;
            $dadosfm->bolsafamilia;
            $dadosfm->moradia;
            $dadosfm->numnis;
            $dadosfm->tipohabitacao;
            $dadosfm->nomecras;
        }
        
        foreach($dadoscrianca as $dadoscrianca){
            $nascimentocrianca = Carbon::parse($dadoscrianca->nascimentocrianca)->format('d/m/y');
            $logradouro = $dadoscrianca->logradouro;
            $bairro = $dadoscrianca->bairro;
            $ncasa = $dadoscrianca->ncasa;
           
        
        }
            
        $cras = Cras::all();
        $pprioritario = PublicoPrioritario::all();
        $escola = Escola::all();
        //return $nomematricula;

        $vagas = Vaga::vagaRematricula();
        $ano = Carbon::now()->year+1;
        $dados = [
            'responsaveis'=>$parentes,
            'dadoscrianca'=>$dadoscrianca,
            'dadosfamilia'=>$dadosfamilia,
            'dadosmatricula'=>$dadosmatricula,
            'cras'=>$cras,
            'pprioritario'=>$pprioritario,
            'escola'=>$escola,
            'ano'=>$ano,
            'vagas'=>$vagas 
        ];

       // return $dados;
        return view('matricula.rematricula', $dados);

    }

    public function confirmarRematricula($idmatricula){
        $hoje = Carbon::now();
        $dadosmatricula = DB::select('select * from dadosmatricula where idmatricula
        = ?', array($idmatricula));

        foreach ($dadosmatricula as $dadosmt) {
            $esseidcrianca = $dadosmt->idcrianca;
            $dadosmt->datamatricula;
            $dadosmt->serieescolar;
            $dadosmt->grupoconvivencia;
            $dadosmt->idmatricula;

        }

        $dadoscrianca = DB::select('select * from dadoscrianca where idcrianca = ?', [$dadosmt->idcrianca]);

        foreach ($dadoscrianca as $dadoscr) {
            $dadoscr->nomecrianca;
            $idade = $dadoscr->nascimentocrianca;
            $dadoscr->logradouro;
            $dadoscr->bairro;
            $dadoscr->ncasa;
            $dadoscr->complementoendereco;
            $dadoscr->cpfcrianca;
            $dadoscr->rgcrianca;
            $dadoscr->sexocrianca;
            $dadoscr->emissorcrianca;
            $dadoscr->idmatricula;
            $dadoscr->nomeescola;
        }


        $parentes = DB::select('select * from parentes where idcrianca = ? ', [$dadosmt->idcrianca]);
        
        foreach($parentes as $parente){
            $parente->nomeresponsavel;
            $parente->idfamilia;
        }

        //return ;

        $dadosfamilia = DB::select('select * from dadosfamilia where idfamilia = ?', [$parente->idfamilia]);
        
        foreach($dadosfamilia as $dadosfm){
            $dadosfm->idfamilia;
            $dadosfm->arearisco;
            $dadosfm->bolsafamilia;
            $dadosfm->moradia;
            $dadosfm->numnis;
            $dadosfm->tipohabitacao;
            $dadosfm->nomecras;
        }
        
        foreach($dadoscrianca as $dadoscrianca){
            $nascimentocrianca = Carbon::parse($dadoscrianca->nascimentocrianca)->format('d/m/y');
            $logradouro = $dadoscrianca->logradouro;
            $bairro = $dadoscrianca->bairro;
            $ncasa = $dadoscrianca->ncasa;
           
        
        }
            
        $cras = Cras::all();
        $pprioritario = PublicoPrioritario::all();
        $escola = Escola::all();
        //return $nomematricula;
        //$anoAtual = new date('Y');
        /*$olha = date('Y');
        $olha = $olha +1;
        $anoAtual = date('$olha-m-d');
        $anoAtual = strtotime($anoAtual);*/
        //$ano = mktime (0, 0, 0, date("m"),  date("d"),  date("Y")+1);
        $ano = Carbon::now()->year+1;
        $dados = [
            'responsaveis'=>$parentes,
            'dadoscrianca'=>$dadoscrianca,
            'dadosfamilia'=>$dadosfamilia,
            'dadosmatricula'=>$dadosmatricula,
            'cras'=>$cras,
            'pprioritario'=>$pprioritario,
            'escola'=>$escola,
            'ano'=>$ano   
        ];/*
        $impressao = PDF::loadView('matricula.rematricula', $dados);
        $impressao->stream('Matricula');*/

        $idade = $hoje->diffInYears($idade);

        $vagas = Vaga::vagaRematricula();
        
        //lógica para pegar vaga de acordo com a idade da criança
        foreach($vagas as $vaga){
            if($vaga->idademin <= $idade and $vaga->idademax >= $idade){
                $idademin = $vaga->idademin;
                $idademax = $vaga->idademax; 
                $vaga->numvaga;
                $vaga->anovaga;
                $vaga->idvaga;
                $essavaga = $vaga->idvaga;
                $essanumvaga = $vaga->numvaga;
            
            }
            
        }

        $matricula = new Matricula();
        //$olha = date('Y');
        //$olha = $olha +1;
        //$hoje = date('Y-m-d');
        //$hoje = mktime (0, 0, 0, date("m"),  date("d"),  date("Y")+1);
        $date = date('Y-m-d');
        $timestamp1 = strtotime($date);
        $hoje = strtotime('+1 year', $timestamp1);
        $hoje = date('Y-m-d', $hoje);
        //$date = Carbon::now()->year+1;
        $matricula->anomatricula = $hoje;
        $matricula->idvaga = $essavaga;
        
        //$matricula->serieescolar = Request::input('serie');
        $matricula->idcrianca = $esseidcrianca;
        
        $matAtivas = Matricula::where('statuscadastro', 'Ativo')->where('idvaga', $essavaga)->sum('statuscadastro');
        
        if($matAtivas < $essanumvaga){
            $matricula->statuscadastro = 'Ativo';
            
        }elseif($matAtivas >= $essanumvaga){
            $matricula->statuscadastro = 'Espera';
            $matricula->dataespera = $hoje;
                
        }
        
        
        //return $matricula;
        $matricula->save();
        
        $turmas = Turma::turmasAtiva();
        return view('matricula.modalTurma')->with('turmas', $turmas)->with('nomecrianca',
        $dadoscrianca->nomecrianca)->with('idmatricula', $matricula->idmatricula);
        
        return redirect()->action('MatriculasController@listaMatriculas');

        return redirect()->action('MatriculasController@precisamRematricular');
    }


    public function precisamRematricular(){
        //$idcriancarematriculada = DB::select('select idcrianca from dadosmatricula where anovaga > ?', [1]) 
        $ano = Carbon::now()->year+1;

        $precisamRematricula = DadosMatricula::rematricula();

        $vagas = Vaga::vagaRematricula();
        $dados = [
            'matRematricula'=>$precisamRematricula,
            'vagas'=>$vagas,
            'ano'=>$ano
        ];
        return view('matricula.listagemRematricula', $dados);
    }

    
    public function editarMatricula($idmatricula){

        //$idmatricula = Request::input('idmatricula');

       // return $idmatricula;

      // return $idmatricula;
        $dadosmatricula = DB::select('select * from dadosmatricula where idmatricula
        = ?', array($idmatricula));

        foreach ($dadosmatricula as $dadosmt) {
            $dadosmt->idcrianca;
            $dadosmt->datamatricula;
            $dadosmt->serieescolar;
            $dadosmt->grupoconvivencia;
            $dadosmt->idmatricula;

        }

        $dadoscrianca = DB::select('select * from dadoscrianca where idcrianca = ?', [$dadosmt->idcrianca]);

        foreach ($dadoscrianca as $dadoscr) {
            $dadoscr->nomecrianca;
            $dadoscr->nascimentocrianca;
            $dadoscr->logradouro;
            $dadoscr->bairro;
            $dadoscr->ncasa;
            $dadoscr->complementoendereco;
            $dadoscr->cpfcrianca;
            $dadoscr->rgcrianca;
            $dadoscr->sexocrianca;
            $dadoscr->emissorcrianca;
            $dadoscr->idmatricula;
            $dadoscr->nomeescola;
        }


        $parentes = DB::select('select * from parentes where idcrianca = ? ', [$dadosmt->idcrianca]);
        
        foreach($parentes as $parente){
            $parente->nomeresponsavel;
            $parente->idfamilia;
        }

        //return ;

        $dadosfamilia = DB::select('select * from dadosfamilia where idfamilia = ?', [$parente->idfamilia]);
        
        foreach($dadosfamilia as $dadosfm){
            $dadosfm->idfamilia;
            $dadosfm->arearisco;
            $dadosfm->bolsafamilia;
            $dadosfm->moradia;
            $dadosfm->numnis;
            $dadosfm->tipohabitacao;
            $dadosfm->nomecras;
        }
        
        foreach($dadoscrianca as $dadoscrianca){
            $nascimentocrianca = Carbon::parse($dadoscrianca->nascimentocrianca)->format('d/m/y');
            $logradouro = $dadoscrianca->logradouro;
            $bairro = $dadoscrianca->bairro;
            $ncasa = $dadoscrianca->ncasa;
           
        
        }
            
        $cras = Cras::all();
        $pprioritario = PublicoPrioritario::all();
        $escola = Escola::all();
        //return $nomematricula;

        $ano = Carbon::now()->year+1;
        $dados = [
            'responsaveis'=>$parentes,
            'dadoscrianca'=>$dadoscrianca,
            'dadosfamilia'=>$dadosfamilia,
            'dadosmatricula'=>$dadosmatricula,
            'cras'=>$cras,
            'pprioritario'=>$pprioritario,
            'escola'=>$escola,
            'ano'=>$ano   
        ];
        
        // return $dadoscrianca;
        return view('matricula.editMatricula', $dados);

    }

    public function confirmarEdit(){
        $cep = Request::input('cep');
        $logradouro = Request::input('logradouro');
        $ncasa = Request::input('ncasa');
        $bairro = Request::input('bairro');
        $complemento = Request::input('complemento');

        $idpessoacrianca = Request::input('idpessoacrianca');
        $pessoacrianca = Pessoa::findOrFail($idpessoacrianca);
        $pessoacrianca->update([
            'nomepessoa'=>Request::input('nomecrianca'),
            'rg'=>Request::input('rgcrianca'),
            'cpf'=>Request::input('cpfcrianca'),
            'cep'=>$cep,
            'logradouro'=>$logradouro,
            'ncasa'=>$ncasa,
            'bairro'=>$bairro,
            'complementoendereco'=>$complemento,
            'sexo'=>Request::input('sexocrianca')
        ]);
        // DB::table('pessoa')
        //     ->where('idpessoa', $idpessoacrianca)
        //     ->update([
        //         'nomepessoa'=>Request::input('nomecrianca'),
        //         'rg'=>Request::input('rgcrianca'),
        //         'cpf'=>Request::input('cpfcrianca'),
        //         'cep'=>$cep,
        //         'logradouro'=>$logradouro,
        //         'ncasa'=>$ncasa,
        //         'bairro'=>$bairro,
        //         'complementoendereco'=>$complemento,
        //         'sexo'=>Request::input('sexocrianca')
        //     ]);

        $idpessoaresponsavel1 = Request::input('idpessoaresponsavel1');

        $responsavel1 = Pessoa::findOrFail($idpessoaresponsavel1);
        $responsavel1->update([
            'nomepessoa'=>Request::input('nomeresp1'),
            'rg'=>Request::input('rgresp1'),
            'cpf'=>Request::input('cpfresp1'),
            'cep'=>$cep,
            'logradouro'=>$logradouro,
            'ncasa'=>$ncasa,
            'bairro'=>$bairro,
            'complementoendereco'=>$complemento,
            'sexo'=>Request::input('sexoresponsavel1')    
        ]);
        // DB::table('pessoa')
        //     ->where('idpessoa', $idpessoaresponsavel1)
        //     ->update([
        //         'nomepessoa'=>Request::input('nomeresp1'),
        //         'rg'=>Request::input('rgresp1'),
        //         'cpf'=>Request::input('cpfresp1'),
        //         'cep'=>$cep,
        //         'logradouro'=>$logradouro,
        //         'ncasa'=>$ncasa,
        //         'bairro'=>$bairro,
        //         'complementoendereco'=>$complemento,
        //         'sexo'=>Request::input('sexoresponsavel1')
        //     ]);
        //return  $pessoacrianca = Pessoa::where('idpessoa', '134');

        $crianca = Crianca::find(Request::input('idcrianca'));
        Request::input('idpublicoprioritario');
        $crianca->update([
            'idescola'=>Request::input('idescola'),
            'idpublicoprioritario'=>Request::input('idpublicoprioritario'),
            'obssaude'=>Request::input('obssaude')
        ]);

        $responsavel1 = Responsavel::find(Request::input('idresponsavel1'));
        $responsavel1->update([
            'estadocivil'=>Request::input('estadocivilresp1'),
            'profissao'=>Request::input('profissaoresp1'),
            'trabalho'=>Request::input('trabalhoresp1'),
            'escolaridade'=>Request::input('escolaridaderesp1'),
            'telefone1'=>Request::input('tel1resp1'),
            'telefone2'=>Request::input('tel2resp1')

        ]);
        // $familia = Familia::find(Request::input('idfamilia'));
        
        if (!empty(Request::input('idresponsavel2'))) {
            $idpessoaresponsavel2 = Request::input('idpessoaresponsavel2');
            $responsavel2 = Pessoa::findOrFail($idpessoaresponsavel2);
            $responsavel2->update([
                'nomepessoa'=>Request::input('nomeresp2'),
                'rg'=>Request::input('rgresp2'),
                'cpf'=>Request::input('cpfresp2'),
                'cep'=>$cep,
                'logradouro'=>$logradouro,
                'ncasa'=>$ncasa,
                'bairro'=>$bairro,
                'complementoendereco'=>$complemento,
                'sexo'=>Request::input('sexoresponsavel2')    
            ]);

            $resposnavel2 = Responsavel::find(Request::input('idresponsavel2'));
            $resposnavel2->update([
                'estadocivil'=>Request::input('estadocivilresp2'),
                'profissao'=>Request::input('profissaoresp2'),
                'trabalho'=>Request::input('trabalhoresp2'),
                'escolaridade'=>Request::input('escolaridaderesp2'),
                'telefone1'=>Request::input('tel1resp2'),
                'telefone2'=>Request::input('tel2resp2')
                
            ]);
        }


         $idfamilia = Request::input('idfamilia');

        $familia = Familia::findOrFail($idfamilia);
       
        $familia->update([
            'idcras'=>Request::input('idcras'),
            'numnis'=>Request::input('numnis'),
            'moradia'=>Request::input('moradia'),
            'arearisco'=>Request::input('arearisco'),
            'bolsafamilia'=>Request::input('bolsafamiliar'),
            'beneficiopc'=>Request::input('beneficiopc')
        ]);
        // DB::table('familia')
        //     ->where('idfamilia', $idfamilia)
        //     ->update([
        //         'idcras'=>Request::input('cras'),
        //         'numnis'=>Request::input('numnis'),
        //         'moradia'=>Request::input('moradia'),
        //         'arearisco'=>Request::input('arearisco'),
        //         'bolsafamilia'=>Request::input('bolsafamiliar'),
        //         'beneficiopc'=>Request::input('beneficiopc')
        //     ]);
       

        //return $pessoacrianca;
        return redirect()->action('MatriculasController@listaMatriculas');
    }

}
