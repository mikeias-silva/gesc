<?php
use Illuminate\Support\Carbon;
namespace App\Http\Controllers;

use App\Responsavel;

use App\Escola;

use App\Familia;

use App\Membro_Familia;

use App\Cras;

use App\Pessoa;

use App\Parentesco;

use Illuminate\Support\Carbon;

use Request;

use App\PublicoPrioritario;

use App\Vaga;

use Illuminate\Support\Facades\DB;



class ResponsavelController extends Controller
{

    public function responsaveis(){

        $responsaveis = Responsavel::all();
        $vagas = Vaga::vagaMatricula();
        $idcrianca='';
        return view('matricula.listagemResponsaveis')->with('responsaveis', $responsaveis)->with('vagas', $vagas)->with('idcrianca', $idcrianca);
    }

    public function torcaResponsaveis($idcrianca, $idresponsavel){

        $responsaveis = Responsavel::all();
        $vagas = Vaga::vagaMatricula();
        return view('matricula.listagemResponsaveis')->with('responsaveis', $responsaveis)->with('vagas', $vagas)->with('idcrianca', $idcrianca)
        ->with('idresponsavel', $idresponsavel);
    }

    public function novoResponsavel(){

        $escolas = Escola::all();
        $cras = Cras::all();
        $idcrianca = "";
        $idresponsavel = "";

        $dados = [
            'cras'=>$cras,
            'escolas'=>$escolas,
            'idcrianca'=>$idcrianca,
            'idresponsavel'=>$idresponsavel
        ];

        return view('matricula.cadastroResponsaveis', $dados);
    }

    //Troca de responsável, cadastro de novo responsável
    public function novoResponsavelTroca($idcrianca, $idresponsavel){

        $escolas = Escola::all();
        $cras = Cras::all();

        $dados = [
            'cras'=>$cras,
            'escolas'=>$escolas,
            'idcrianca'=>$idcrianca,
            'idresponsavel'=>$idresponsavel
        ];

        return view('matricula.cadastroResponsaveis', $dados);
    }

    public function adicionaResponsavel(){
        // return dd($request->all());
       /* $cep = Request::input('cep');
        $bairro = Request::input('bairro');
        $logradouro = Request::input('logradouro');
        $complemento = Request::input('complemento');
        $ncasa = Request::input('ncasa');*/

        $pprioritario = PublicoPrioritario::all();
        $escolas = Escola::all();
       

        //Dados família 
        /*
        $familia = new Familia();
        $familia->moradia = Request::input('moradia');
        $familia->arearisco = Request::input('arearisco');
        $familia->tipohabitacao = Request::input('tipohabitacao');
        $familia->numnis = Request::input('numnis');
        $familia->beneficiopc = Request::input('beneficiopc');
        $familia->bolsafamilia = Request::input('bolsafamilia');
        $familia->idcras = Request::input('idcras');
       // $familia->rendapercapta = Request::input('rendafamiliar');
        // return $familia;
         $familia->save();
        //add familia aos responsavels adicionados por ultimo
        //  $responsavel1->update(array('idfamilia' =>$familia->id));
        //  $responsavel2->update(array('idfamilia' =>$familia->id));
        //---------------------------------------------------
    
      
        //------MEMBRO FAMILIA--------
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
            
            
        }*/
       //return $teste;
        // if(!empty(Request::input('nomemembro1'))) {
        //     $membro = new Membro_Familia();
        //     $membro->nomemembro = Request::input('nomemembro1');
        //     $membro->datanascimento = Request::input('nascimentomembro1');
        //     $membro->localtrabalho = Request::input('trabmembro1');
        //     $membro->idescola = Request::input('escolamembro1');
        //     $membro->idfamilia = $familia->id;
        //     $membro->save();
        // }
        // if(!empty(Request::input('nomemembro2'))) {
        //     $membro = new Membro_Familia();
        //     $membro->nomemembro = Request::input('nomemembro2');
        //     $membro->datanascimento = Request::input('nascimentomembro2');
        //     $membro->localtrabalho = Request::input('trabmembro2');
        //     $membro->idescola = Request::input('escolamembro2');
        //     $membro->idfamilia = $familia->id;
        //     $membro->save();
        // }
        // if(!empty(Request::input('nomemembro3'))) {
        //     $membro = new Membro_Familia();
        //     $membro->nomemembro = Request::input('nomemembro3');
        //     $membro->datanascimento = Request::input('nascimentomembro3');
        //     $membro->localtrabalho = Request::input('trabmembro3');
        //     $membro->idescola = Request::input('escolamembro3');
        //     $membro->idfamilia = $familia->id;
        //     $membro->save();
        // }
        // if(!empty(Request::input('nomemembro4'))) {
        //     $membro = new Membro_Familia();
        //     $membro->nomemembro = Request::input('nomemembro4');
        //     $membro->datanascimento = Request::input('nascimentomembro4');
        //     $membro->localtrabalho = Request::input('trabmembro4');
        //     $membro->idescola = Request::input('escolamembro4');
        //     $membro->idfamilia = $familia->id;
        //     $membro->save();
        // }

        // if(!empty(Request::input('nomemembro5'))) {
        //     $membro = new Membro_Familia();
        //     $membro->nomemembro = Request::input('nomemembro5');
        //     $membro->datanascimento = Request::input('nascimentomembro5');
        //     $membro->localtrabalho = Request::input('trabmembro5');
        //     $membro->idescola = Request::input('escolamembro5');
        //     $membro->idfamilia = $familia->id;
        //     $membro->save();
        // }
            
        

                
        
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
        $pessoaresponsavel1->emissorrg = Request::input('emissorrgresponsavel1');

        if (!empty(Request::input('cpfresp1'))) {
            $pessoaresponsavel1->cpf = Request::input('cpfresp1');
        } 
        
        $pessoaresponsavel1->sexo = Request::input('sexoresp1');;
        //$pessoaresponsavel1->cep = $cep;
        //$pessoaresponsavel1->bairro = $bairro;
        //$pessoaresponsavel1->logradouro = $logradouro;
        //$pessoaresponsavel1->complementoendereco = $complemento;
        //$pessoaresponsavel1->ncasa = $ncasa;

        $pessoaresponsavel1->save();
        
        
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
        $responsavel1->localtrabalho = Request::input('trabalhoresp1');
        $responsavel1->telefone = Request::input('tel1resp1');
        $responsavel1->telefone2 = Request::input('tel2resp1');
        $responsavel1->escolaridade = Request::input('escolaridaderesp1');
        $responsavel1->outrasobs = Request::input('obsresp1');
        $responsavel1->idpessoa = $pessoaresponsavel1->idpessoa;
        //$responsavel1->idfamilia = $familia->idfamilia;
        $responsavel1->save();

        //return $responsavel1->idresponsavel;
        
       

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
        
        if(!empty(Request::input('nomeresp2'))){
            $pessoaresponsavel2 = new Pessoa();
            $pessoaresponsavel2->nomepessoa = Request::input('nomeresp2');
            $pessoaresponsavel2->datanascimento = Request::input('datanascimentoresp2');
            $pessoaresponsavel2->rg = Request::input('rgresp2');
            $pessoaresponsavel1->emissorrg = Request::input('emissorrgresponsavel2');
            $pessoaresponsavel2->cpf = Request::input('cpfresp2');
            $pessoaresponsavel2->sexo = Request::input('sexoresp2');
            /*$pessoaresponsavel2->cep = $cep;


            if (!empty(Request::input('cpfresp2'))) {
                $pessoaresponsavel2->cpf = Request::input('cpfresp2');
            } 

            $pessoaresponsavel2->sexo = Request::input('sexoresp2');;
            $pessoaresponsavel2->cep = $cep;

            $pessoaresponsavel2->bairro = $bairro;
            $pessoaresponsavel2->logradouro = $logradouro;
            $pessoaresponsavel2->complementoendereco = $complemento;
            $pessoaresponsavel2->ncasa = $ncasa;*/
            $pessoaresponsavel2->save();
        
        
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
            $responsavel2->localtrabalho = Request::input('trabalhoresp2');
            $responsavel2->telefone = Request::input('tel1resp2');
            $responsavel2->telefone2 = Request::input('tel2resp2');
            $responsavel2->escolaridade = Request::input('escolaridaderesp2');
            $responsavel2->outrasobs = Request::input('obsresp2');
            $responsavel2->idpessoa = $pessoaresponsavel2->idpessoa;
            //$responsavel2->idfamilia = $familia->idfamilia;
            $responsavel2->save();

            
           
        }

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
          
        /* DB::insert('insert into familia(moradia, arearisco, tipohabitacao, numnis, beneficiopc, bolsafamilia, idcras)
        values(?, ?, ?, ?, ?, ?, ?)',
        array($moradia, $arearisco, $tipohabitacao, $numnis, $beneficiopc, $bolsafamilia, $cras));
    */

     $ano = date('Y');
     $cras = Cras::all();

    if (!empty($responsavel2->idfamilia)) {
        $dados = [
            'responsaveis'=>123654,
            /*'cep'=>$cep,
            'bairro'=>$bairro,
            'logradouro'=>$logradouro,
            'ncasa'=>$ncasa,
            'complemento'=>$complemento,*/
            'idresponsavel1'=>$responsavel1->idresponsavel,
            'idresponsavel2'=>$responsavel2->idresponsavel,
            'pprioritario'=>$pprioritario,
            'escolas'=>$escolas,
            'ano'=>$ano
    
        ];
        toastr()->success('Responsável adicionado com sucesso!');
        return view('matricula.cadastroCrianca', $dados)->with('ano', $ano)->with('cras', $cras);
    }$dados = [
        'responsaveis'=>123654,
        /*'cep'=>$cep,
        'bairro'=>$bairro,
        'logradouro'=>$logradouro,
        'ncasa'=>$ncasa,
        'complemento'=>$complemento,*/
        'idresponsavel1'=>$responsavel1->idresponsavel,
        'pprioritario'=>$pprioritario,
        'escolas'=>$escolas,
        'ano'=>$ano

    ];

    //return $responsavel1->id;
    toastr()->success('Responsável adicionado com sucesso!');
    return view('matricula.cadastroCrianca', $dados)->with('ano', $ano)->with('cras', $cras);
    

    //return $pessoaresponsavel1->nomepessoa ;
    return view('matricula.cadastroCrianca', $dados)->with('ano', $ano)->with('cras', $cras);
    }
    
    public function atualizaParentesco($idcrianca, $idresponsavel){
        $ano = date("Y");
        $idresponsaveis = Request::input('idresponsavel');

        $idresponsavel1 = $idresponsaveis[0];
        if (!empty($idresponsaveis[1])) {
            $idresponsavel2 = $idresponsaveis[1];
        }

        DB::update("update parentesco set idresponsavel = '{$idresponsavel1}' where idcrianca='{$idcrianca}' and idresponsavel='{$idresponsavel}'");
        $idmatricula = DB::select("select idmatricula from matriculas where idcrianca='{$idcrianca}' and EXTRACT(YEAR FROM anomatricula)='{$ano}'");
        //var_dump ($idmatricula);
        //toastr()->success('Troca de responsável efetuada com sucesso!');
        return redirect("editarMatricula_{$idmatricula[0]->idmatricula}");
    }

    public function adicionaoResponsavelTroca($idcrianca, $idresponsavel){
        $ano = date("Y");
        //Cadastra Pessoa
        $pessoaresponsavel1 = new Pessoa();
        $pessoaresponsavel1->nomepessoa = Request::input('nomeresp1');
        $pessoaresponsavel1->datanascimento = Request::input('datanascimentoresp1');
        $pessoaresponsavel1->rg = Request::input('rgresp1');
        $pessoaresponsavel1->emissorrg = Request::input('emissorrgresponsavel1');
        $pessoaresponsavel1->cpf = Request::input('cpfresp1');
        $pessoaresponsavel1->sexo = Request::input('sexoresp1');
        $pessoaresponsavel1->save();
        //Cadastra responsável
        $responsavel1 = new Responsavel();
        $responsavel1->estadocivil = Request::input('estadocivilresp1');
        $responsavel1->profissao = Request::input('profissaoresp1');
        $responsavel1->localtrabalho = Request::input('trabalhoresp1');
        $responsavel1->telefone = Request::input('tel1resp1');
        $responsavel1->telefone2 = Request::input('tel2resp1');
        $responsavel1->escolaridade = Request::input('escolaridaderesp1');
        $responsavel1->outrasobs = Request::input('obsresp1');
        $responsavel1->idpessoa = $pessoaresponsavel1->idpessoa;
        //$responsavel1->idfamilia = $familia->idfamilia;
        $responsavel1->save();

        DB::update("update parentesco set idresponsavel = '{$responsavel1->idresponsavel}' where idcrianca='{$idcrianca}' and idresponsavel='{$idresponsavel}'");
        
        $idmatricula = DB::select("select idmatricula from matriculas where idcrianca='{$idcrianca}' and EXTRACT(YEAR FROM anomatricula)='{$ano}'");
        return redirect("editarMatricula_{$idmatricula[0]->idmatricula}");

        //return redirect("editarMatricula_{$idmatricula[0]->idmatricula}");
    }
    
}
