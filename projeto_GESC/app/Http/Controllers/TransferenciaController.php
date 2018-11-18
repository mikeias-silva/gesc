<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Turma;
use App\Matricula;



class TransferenciaController extends Controller {

    function calculaIdade($dataNasc){
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');
        //Data do aniversário
        $nascimento = explode('-', $dataNasc);
        $dianasc = ($nascimento[2]);
        $mesnasc = ($nascimento[1]);
        $anonasc = ($nascimento[0]);
        // se for formato do banco, use esse código em vez do de cima!
        /*
        $nascimento = explode('-', $nascimento);
        $dianasc = ($nascimento[2]);
        $mesnasc = ($nascimento[1]);
        $anonasc = ($nascimento[0]);
        */
        //Calculando sua idade
        $idade = $ano - $anonasc; // simples, ano- nascimento!
        if ($mes < $mesnasc) // se o mes é menor, só subtrair da idade
        {
            $idade--;
            return $idade;
        }
        elseif ($mes == $mesnasc && $dia <= $dianasc) // se esta no mes do aniversario mas não passou ou chegou a data, subtrai da idade
        {
            $idade--;
            return $idade;
        }
        else // ja fez aniversario no ano, tudo certo!
        {
            return $idade;
        }
    }

    public function listaTurmasDois(){
        $aux=0;
        $ano= date("Y");
        $numeroAlunos=[];
        $listaTurmas = DB::select('select turma.idturma, turma.grupoconvivencia, turma.statusTurma, turma.Turno, turma.idusuario, usuario.Nome from usuario, turma
        where usuario.id = turma.idUsuario && turma.statusTurma = 1');

        foreach($listaTurmas as $c){
            $aux = DB::select("select count(idturma) as numero from matriculas where idturma='{$c->idturma}' and statuscadastro='Ativo' and  matriculas.anomatricula = '{$ano}'");
            array_push($numeroAlunos, $aux[0]->numero);
        }


        return view('transferenciaAlunos.lista_turma_transferencia')->with('listaTurmas', $listaTurmas)->with('numeroAlunos', $numeroAlunos);
    }

    public function listaAlunos($idturma){
        //echo($idturma);
        $ano= date("Y");
        $nomeTurma = DB::select("select turma.grupoconvivencia, turma.Turno, turma.idusuario, usuario.Nome from usuario, turma
        where usuario.id = turma.idUsuario && turma.idturma='{$idturma}'");
        $aux=0;
        $numeroAlunos=[];
        $listaTurmas = DB::select("select turma.idturma, turma.grupoconvivencia, turma.statusTurma, turma.Turno, turma.idusuario, usuario.Nome from usuario, turma
        where usuario.id = turma.idUsuario && turma.statusTurma = 1 && turma.idturma!='{$idturma}' ");

        foreach($listaTurmas as $c){
            $aux = DB::select("select count(idturma) as numero from gesc.`matriculas` where idturma='{$c->idturma}'");
            array_push($numeroAlunos, $aux[0]->numero);
        }

        $listaAlunos = DB::select("select pessoa.nomepessoa, matriculas.idmatricula, pessoa.datanascimento from matriculas, crianca, pessoa
        where crianca.idcrianca=matriculas.idcrianca && crianca.idpessoa=pessoa.idpessoa 
        && matriculas.idturma='{$idturma}' && matriculas.statuscadastro=1
        && EXTRACT(YEAR FROM matriculas.anomatricula)='{$ano}' ORDER BY nomepessoa ASC");

        for ($i=0; $i<count($listaAlunos); $i++){
            //calculaIdade("2000-02-20");
            //$aux=TransferenciaController::calculaIdade($listaAlunos[$i]->datanascimento);
            $listaAlunos[$i]->datanascimento=TransferenciaController::calculaIdade($listaAlunos[$i]->datanascimento);
        }



        return view('transferenciaAlunos.lista_alunos_transferencia')->with('nomeTurma', $nomeTurma)->with('listaTurmas', $listaTurmas)->with('numeroAlunos', $numeroAlunos)
        ->with('listaAlunos', $listaAlunos);
    }

    public function transfereAlunos(Request $request){
        //$checkTransferencia = $_POST['verificaTransferencia'];
       // $checkTransferencia = (isset($_POST["verificaTransferencia"])) ? $_POST["verificaTransferencia"] : "0";

        $idMatricula = $_POST['idmatricula'];
        $novaTurma = $_POST['novaTurma'];

        for ($i=0; $i<count($idMatricula); $i++){
            $checkTransferencia[$i] = isset($_POST['verificaTransferencia'][$i]) ? $_POST['verificaTransferencia'][$i] : "0";
        }

        for ($i=0; $i<count($idMatricula); $i++){
            if($checkTransferencia[$i]=="1"){
                $matricula = Matricula::find($idMatricula[$i]);
                $matricula->idturma = $novaTurma[0];
                $matricula->update();
            }
        }
        toastr()->success('Transferência(s) realizada(s) com sucesso!');
        return redirect()->action('TransferenciaController@listaTurmasDois');


    }

    


}
