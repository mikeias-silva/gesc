<?php

namespace App\Http\Controllers;

use Request;

use App\Responsavel;

use App\Escola;

use App\Pessoa;

use App\Parentesco;

use App\PublicoPrioritario;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

use App\Familia;

use App\Membro_Familia;

use App\Crianca;

use App\Vaga;

use App\Cras;

use App\Matricula;

use App\Historico_Matricula;

use App\Turma;

class CriancaController extends Controller
{
    public function cadastroCrianca(){
        $escolas = Escola::all();
        $idresponsaveis = Request::input('idresponsavel');

        $idresponsavel1 = $idresponsaveis[0];
        if (!empty($idresponsaveis[1])) {
            $idresponsavel2 = $idresponsaveis[1];
        }
        
        
        $nomepessoa = Request::input('nomeresp1');
        
        $pprioritario = PublicoPrioritario::all();
     
        $endereco = DB::select('select * from dadosresponsavel where idresponsavel = ?', [$idresponsavel1]);
        foreach ( $endereco as  $endereco) {
            $cep = $endereco->cep;
            $bairro = $endereco->bairro;
            $logradouro = $endereco->logradouro;
            $complemento = $endereco->complementoendereco;
            $ncasa = $endereco->ncasa;
        }
        
       
        $escolas = Escola::all();
        $cras = Cras::all();
        $ano = date('Y');

        if (!empty($idresponsaveis[1])) {
            $dados = [
                'responsaveis'=>$idresponsaveis,
                'logradouro'=>$logradouro,
                'cep'=>$cep,
                'bairro'=>$bairro,
                'ncasa'=>$ncasa,
                'complemento'=>$complemento,
                'idresponsavel1'=>$idresponsaveis[0],
                'idresponsavel2'=>$idresponsaveis[1],
                'escolas'=>$escolas,
                'cras'=>$cras,
                'pprioritario'=>$pprioritario,
            ]; 
            return view('matricula.cadastroCrianca', $dados)->with('ano', $ano);
        }
        
        $dados = [
            'responsaveis'=>$idresponsaveis,
            'logradouro'=>$logradouro,
            'cep'=>$cep,
            'bairro'=>$bairro,
            'ncasa'=>$ncasa,
            'complemento'=>$complemento,
            'idresponsavel1'=>$idresponsaveis[0],
            'escolas'=>$escolas,
            'cras'=>$cras,
            'pprioritario'=>$pprioritario,
        ]; 
        
        return view('matricula.cadastroCrianca', $dados)->with('ano', $ano);
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
        if (!empty(Request::input('cpfcrianca'))) {
            $pessoacrianca->cpf = $cpfcrianca;
        }
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
        $hoje = Carbon::now()->year;
      //  $idpessoa = 1; 

        $crianca = new Crianca();
        $crianca->obssaude = Request::input('obssaude');
        $crianca->datacadastro = $hoje;
        $crianca->idescola = Request::input('escola');;
        $crianca->idpublicoprioritario = Request::input('pprioritario');
        $crianca->idpessoa = $pessoacrianca->idpessoa;
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
        $parentesco->save();

        
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
        $anoSelecionado = Request::input('anomatricula');
        foreach($vagas as $vaga){
            if($vaga->idademin <= $idade and $vaga->idademax >= $idade and $vaga->anovaga == $anoSelecionado){
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
        
        $anoAtual = date('Y');
        $matricula = new Matricula();
        
        if($anoAtual == $anoSelecionado){
            $matricula->anomatricula = $hoje;
        }
        elseif($anoAtual < $anoSelecionado){
            $date = date('Y-m-d');
            $date = strtotime($date);
            $proximoAno = strtotime('+1 year', $date);
            $proximoAno = date('Y-m-d', $proximoAno);
            $matricula->anomatricula = $hoje+1;
        }

        $matricula->serieescolar = Request::input('serie');
        $matricula->idcrianca = $crianca->idcrianca;
        $historico_matricula = new Historico_matricula();

        if (!empty($essavaga)) {
           
            $matricula->idvaga = $essavaga;
            
            $matAtivas = Matricula::where('statuscadastro', 'Ativo')->where('idvaga', $essavaga)->sum('statuscadastro');
            // $matAtivas = Matricula::where('idvaga', $vaga->idvaga);

            if($matAtivas < $essanumvaga){
                $matricula->statuscadastro = 'Ativo';
                $historico_matricula->dataativacao = $hoje;
                
            }elseif($matAtivas >= $essanumvaga){
                $matricula->statuscadastro = 'Espera';
                $matricula->dataespera = $hoje;
                    
            }
        }elseif(empty($essavaga)){
            $matricula->statuscadastro = 'Espera';
            $matricula->dataespera = $hoje;
        }
        
        //return $matricula;
        $matricula->save();

        //Cadastro família 
        
        $familia = new Familia();
        $familia->moradia = Request::input('moradia');
        $familia->arearisco = Request::input('arearisco');
        $familia->tipohabitacao = Request::input('tipohabitacao');
        $familia->numnis = Request::input('numnis');
        $familia->beneficiopc = Request::input('beneficiopc');
        $familia->bolsafamilia = Request::input('bolsafamilia');
        $familia->idcras = Request::input('idcras');
        $familia->idcrianca = $crianca->idcrianca;
       // $familia->rendapercapta = Request::input('rendafamiliar');
        // return $familia;
         $familia->save();

         //------MEMBRO FAMILIA-------- 
       // return Request::input('nomemembro');
         if (empty(Request::input('nomemembro'))) {
            $membros = Request::input('nomemembro');
            $nascimentomembro = Request::input('nascimentomembro');
            $localtrabalhamembro = Request::input('trabmembro');
            $escolamembro = Request::input('escolamembro');
            $i = 0;
            foreach ($membros as $nomemembro) {
                
                $membro = new Membro_Familia();
                $membro->nomemembro = $membros[$i];
                $membro->datanascimento = $nascimentomembro[$i];
                $membro->localtrabalho = $localtrabalhamembro[$i];
                $membro->idescola = $escolamembro[$i];
                $membro->idfamilia = $familia->idfamilia;
                $membro->save();
                $i++;
                
                
            }
         }
        
        
        
    /*
        DB::insert('insert into Matricula(datasairespera, satuscadastro, dataespera, serieescolar, 
        anomatricula, idturma, idvaga, idcrianca)
        values(?, ?, ?, ?, ?, ?, ?, ?)',
        array(, , , , , , ,));

    */
        //return $idade;

        if($matricula->statuscadastro == 'Espera'){
            toastr()->warning('Não há vagas disponíveis '.$nomecrianca.' está na fila de espera');
            return redirect()->action('MatriculasController@listaMatriculas');
        }else{
            $historico_matricula->idmatricula = $matricula->idmatricula;
            $historico_matricula->save(); 
            
            $turmas = Turma::turmasAtiva();

            toastr()->success('Matrícula de '.$nomecrianca.' adicionado com sucesso!');
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
