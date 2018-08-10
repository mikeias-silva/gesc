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
use Request;

use Illuminate\Support\Carbon;
use Illuminate\Database\MySqlConnection;
use App\membro_familia;

use PDF;

class MatriculasController extends Controller
{

    
    public function listaMatriculas(){

       // $matAtivas =  DB::select('select * from matriculas where statuscadastro = ?', ['Ativo']);
        //dd($matAtivas);
       //$matAtivas = DB::select('select * from matriculas where statuscadastro = ');

//        $matAtivas = Matricula::where('statuscadastro', 'ativo');

        $matAtivas = Matricula::matriculasAtiva();
       // dd($matAtivas);
        //return;

        $matInativas = Matricula::matriculasInativas();
       // return $matInativas;

       $matEspera = Matricula::matriculasEspera();
        return view('matricula.matriculas')->with('matAtivas', $matAtivas)->with('matInativas', $matInativas)
        ->with('matEspera', $matEspera);
       
      //return view('matricula.matriculas');
    }


    public function novaMatricula(){

        $cras = Cras::all();
        $escola = escola::all();
        $pprioritario = PublicoPrioritario::all();
        $turmas  = Turma::all();
        return view('matricula.novaMatricula')->with('cras', $cras)->with('escola', $escola)
        ->with('pprioritario', $pprioritario)->with('turmas', $turmas);
    }

    public function imprime(){
        $matAtivas = Matricula::matriculasAtiva();
        $matInativas = Matricula::matriculasInativas();
        $matEspera = Matricula::matriculasEspera();
        $hoje = Carbon::now()->year;
        $dados = ['ano' => $hoje];
        


       $impressao = PDF::loadView('matricula.impressao', $dados);
       return $impressao->stream('Matricula');
     }

    public function adicionaMatricula(){
        
       
        $hoje = Carbon::now();
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

        $crianca = new Crianca();
        $crianca->obssaude = Request::input('obssaude');
        $crianca->datacadastro = $hoje;
        $crianca->idescola = Request::input('escola');;
        $crianca->idpublicoprioritario = Request::input('pprioritario');
        $crianca->idpessoa = $pessoacrianca->id;
       // $crianca->save();
        
       /*
        DB::insert('insert into crianca(obssaude, datacadastro, idpessoa, idescola, idpublicoprioritario) 
        values(?, ?, ?, ?, ?)',
        array($obssaude, $datacadastro, $idpessoa, $idescola, $idpublicoprioritario));

        //-------------------------------*
             
        
        //--------------------------------------------------
        //responsavel 01
        /*$nomeresp1 = Request::input('nomeresp1');	
        $sexoresp1 = Request::input('sexoresp1');	
        $datanascimentoresp1 = Request::input('datanascimentoresp1');
        $rgresp1 = Request::input('rgresp1');
        $cpfresp1 = Request::input('cpfresp1');	*/
        
      /*  DB::insert('insert into pessoa(nomepessoa, datanascimento, sexo, rg, cpf, cep, bairro, logradouro, complementoendereco)
        values(?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($nomeresp1, $datanascimentoresp1,  $sexoresp1, $rgresp1, $cpfresp1, $cep, $bairro, $logradouro, $complemento));
*/
        
        $pessoaresponsavel1 = new Pessoa();
        $pessoaresponsavel1->nomepessoa = Request::input('nomeresp1');
        $pessoaresponsavel1->datanascimento = Request::input('datanascimentoresp1');
        $pessoaresponsavel1->rg = Request::input('rgresp1');
        $pessoaresponsavel1->cpf = Request::input('cpfresp1');
        $pessoaresponsavel1->sexo = Request::input('sexoresp1');;
        $pessoaresponsavel1->cep = $cep;
        $pessoaresponsavel1->bairro = $bairro;
        $pessoaresponsavel1->logradouro = $logradouro;
        $pessoaresponsavel1->complementoendereco = $complemento;
      //  $pessoaresponsavel1->save();
        
        
        /*$estadocivilresp1 = Request::input('estadocivilresp1');	
        $profissaoresp1 = Request::input('profissaoresp1');	
        $salarioresp1 = Request::input('salarioresp1');
        $trabalhoresp1 = Request::input('trabalhoresp1');	
        $escolaridaderesp1 = Request::input('escolaridaderesp1');	
        $tel1resp1 = Request::input('tel1resp1');	
        $tel2resp1 = Request::input('tel2resp1');
        $obsresp1 = Request::input('obsresp1');*/

        $responsavel1 = new Responsavel();
        $responsavel1->estadocivil = Request::input('estadocivilresp1');
        $responsavel1->profissao = Request::input('profissaoresp1');
        $responsavel1->salario = Request::input('salarioresp1');
        $responsavel1->localtrabalho = Request::input('trabalhoresp1');
        $responsavel1->telefone = Request::input('tel1resp1');
        $responsavel1->telefone2 = Request::input('tel2resp1');
        //$responsavel1->escolaridade = Request::input('escolaridaderesp1');
        $responsavel1->outrasobs = Request::input('obsresp1');
        $responsavel1->idpessoa = $pessoaresponsavel1->id;
        //$responsavel1->save();
        //$responsavel1->idfamilia = 
        /*DB::insert('insert into responsavel(estadocivil, localtrabalho, telefone, telefone2, escolaridade, profissao,
        salario, outrasobs) values(?, ?, ?, ?, ?, ?, ?, ?)',
        array($estadocivilresp1, $trabalhoresp1, $tel1resp1, $tel2resp1,
        $escolaridaderesp1, $profissaoresp1, $salarioresp1, $obsresp1));*/
        //------------------------------------------------------

        //--------------------------------------------------
        //responsavel 02
        /*$nomeresp2 = Request::input('nomeresp2');	
        $sexoresp2 = Request::input('sexoresp2');	
        $datanascimentoresp2 = Request::input('datanascimentoresp2');
        $rgresp2 = Request::input('rgresp2');
        $cpfresp2 = Request::input('cpfresp2');	*/
        
        $pessoaresponsavel2 = new Pessoa();
        $pessoaresponsavel2->nomepessoa = Request::input('nomeresp2');
        $pessoaresponsavel2->datanascimento = Request::input('datanascimentoresp2');
        $pessoaresponsavel2->rg = Request::input('rgresp2');
        $pessoaresponsavel2->cpf = Request::input('cpfresp2');
        $pessoaresponsavel2->sexo = Request::input('sexoresp2');;
        $pessoaresponsavel2->cep = $cep;
        $pessoaresponsavel2->bairro = $bairro;
        $pessoaresponsavel2->logradouro = $logradouro;
        $pessoaresponsavel2->complementoendereco = $complemento;
       // $pessoaresponsavel2->save();
        /*
        DB::insert('insert into pessoa(nomepessoa, datanascimento, sexo, rg, cpf, cep, bairro, logradouro, complementoendereco)
        values(?, ?, ?, ?, ?, ?, ?, ?, ?)',
        array($nomeresp2, $datanascimentoresp2, $sexoresp2, $rgresp2, $cpfresp2, $cep, $bairro, $logradouro, $complemento));
*/
        
        /*$estadocivilresp2 = Request::input('estadocivilresp2');	
        $profissaoresp2 = Request::input('profissaoresp2');	
        $salarioresp2 = Request::input('salarioresp2');
        $trabalhoresp2 = Request::input('trabalhoresp2');	
        $escolaridaderesp2 = Request::input('escolaridaderesp2');	
        $tel1resp2 = Request::input('tel1resp2');	
        $tel2resp2 = Request::input('tel2resp2');
        $obsresp2 = Request::input('obsresp2');*/

        $responsavel2 = new Responsavel();
        $responsavel2->estadocivil = Request::input('estadocivilresp2');
        $responsavel2->profissao = Request::input('profissaoresp2');
        $responsavel2->salario = Request::input('salarioresp2');
        $responsavel2->localtrabalho = Request::input('trabalhoresp2');
        $responsavel2->telefone = Request::input('tel1resp2');
        $responsavel2->telefone2 = Request::input('tel2resp2');
        //$responsavel2->escolaridade = Request::input('escolaridaderesp2');
        $responsavel2->outrasobs = Request::input('obsresp2');
        $responsavel2->idpessoa = $pessoaresponsavel2->id;
       // $responsavel2->save();
        /*
        DB::insert('insert into responsavel(estadocivil, localtrabalho, telefone, telefone2, escolaridade, profissao,
        salario, outrasobs) values(?, ?, ?, ?, ?, ?, ?, ?)',
        array($estadocivilresp2, $trabalhoresp2, $tel1resp2, $tel2resp2,
        $escolaridaderesp2, $profissaoresp2, $salarioresp2, $obsresp2));*/
        //------------------------------------------------------

        //---------------------------------------------
        //membro familia
        //-------------

        //------------------------------------------------
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
        
       /* DB::insert('insert into familia(moradia, arearisco, tipohabitacao, numnis, beneficiopc, bolsafamilia, idcras)
        values(?, ?, ?, ?, ?, ?, ?)',
        array($moradia, $arearisco, $tipohabitacao, $numnis, $beneficiopc, $bolsafamilia, $cras));
*/
        $familia = new Familia();
        $familia->moradia = Request::input('moradia');
        $familia->arearisco = Request::input('arearisco');
        $familia->tipohabitacao = Request::input('tipohabitacao');
        $familia->numnis = Request::input('numnis');
        $familia->beneficiopc = Request::input('beneficiopc');
        $familia->bolsafamilia = Request::input('bolsafamilia');
        $familia->idcras = Request::input('cras');
        //$familia->idmembro = 
       // $familia->save();
        //add familia aos responsavels adicionados por ultimo
      //  $responsavel1->update(array('idfamilia' =>$familia->id));
      //  $responsavel2->update(array('idfamilia' =>$familia->id));
        //---------------------------------------------------
        //MUDAR FK DE MEMBRO FAMILIA EM FAMILIA PARA MEMMBRO FAMILIA COM FK DE FAMILIA

        $membro = new Membro_Familia();
        $membro->nomemembro = Request::input('nomemembro1');
        $membro->datanascimento = Request::input('nascimentomembro1');
        $membro->localtrabalha = Request::input('trabmembro1');
        $membro->salario = Request::input('salariomembro1');
        $membro->idescola = Request::input('escolamembro1');
        $membro->idfamilia = $familia->id;
       // $membro->save();
      
        //-----------------------------------
        //MATRICULA
        
        $dataespera = Carbon::now();
       // $datasairespera;

       $idade = $hoje->diffInYears($datanascimentocrianca);
        
        //$vagas = DB::select('select * from vagas where ? >= idademin and ? <= idademax', [$idade, $idade]); 
        $vagas = Vaga::all();
        //lógica para pegar vaga de acordo com a idade da criança
       foreach($vagas as $vaga){
           echo '[passou aqui, ]';
            if($vaga->idademin <= $idade and $vaga->idademax >= $idade){
               echo '[ e aqui 1...]';
               $idademin = $vaga->idademin;
               $idademax = $vaga->idademax;
               echo $vaga->idademax;
               $vaga->numvaga;
               $vaga->anovaga;
               $vaga->idvaga;
               echo 'id do if'.$vaga->idvaga;
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
        $matricula->idturma = Request::input('turma');
        $matricula->serieescolar = Request::input('serie');
        $matricula->idcrianca = $crianca->idcrianca;;
       
      /*  $matAtivas = Matricula::where('statuscadastro', 'ativo')->where('idvaga', $essavaga)->sum('statuscadastro');
       // $matAtivas = Matricula::where('idvaga', $vaga->idvaga);
             
        if($matAtivas < $essanumvaga){
            $matricula->statuscadastro = 'Ativo';
            
        }elseif($matAtivas > $essanumvaga){
            $matricula->statuscadastro = 'Espera';
            
        }*/
        
      //  $matricula->save();

       
/*
        DB::insert('insert into Matricula(datasairespera, satuscadastro, dataespera, serieescolar, 
        anomatricula, idturma, idvaga, idcrianca)
        values(?, ?, ?, ?, ?, ?, ?, ?)',
        array(, , , , , , ,));

*/
        //return $idade;
        return redirect()->action('MatriculasController@listaMatriculas');
     }

    

/*
     public funcion mostraEscolas(){
        $escola = escola::all();

        return with('escola', $escola);
     }*/
}
