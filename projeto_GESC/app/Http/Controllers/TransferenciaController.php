<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Turma;
use App\Matricula;



class TransferenciaController extends Controller {

    public function listaTurmasDois(){
        $aux=0;
        $numeroAlunos=[];
        $listaTurmas = DB::select('select turma.idturma, turma.GrupoConvivencia, turma.statusTurma, turma.Turno, turma.idusuario, usuario.Nome from usuario, turma
        where usuario.idUsuario = turma.idUsuario && turma.statusTurma = 1');
        foreach($listaTurmas as $c){
            $aux = DB::select("select count(idturma) as numero from gesc_dois.`matriculas` where idturma='{$c->idturma}'");
            array_push($numeroAlunos, $aux[0]->numero);
        }

        return view('transferenciaAlunos.lista_turma_transferencia')->with('listaTurmas', $listaTurmas)->with('numeroAlunos', $numeroAlunos);
    }

    public function listaAlunos($idturma){
        //echo($idturma);
        $ano= date("Y");
        $nomeTurma = DB::select("select turma.GrupoConvivencia, turma.Turno, turma.idusuario, usuario.Nome from usuario, turma
        where usuario.idUsuario = turma.idUsuario && turma.idturma='{$idturma}'");
        $aux=0;
        $numeroAlunos=[];
        $listaTurmas = DB::select("select turma.idturma, turma.GrupoConvivencia, turma.statusTurma, turma.Turno, turma.idusuario, usuario.Nome from usuario, turma
        where usuario.idUsuario = turma.idUsuario && turma.statusTurma = 1 && turma.idturma!='{$idturma}'");
        foreach($listaTurmas as $c){
            $aux = DB::select("select count(idturma) as numero from gesc_dois.`matriculas` where idturma='{$c->idturma}'");
            array_push($numeroAlunos, $aux[0]->numero);
        }
        $listaAlunos = DB::select("select pessoa.nomepessoa, matriculas.idmatricula, crianca.idcrianca from matriculas, crianca, pessoa
        where crianca.idcrianca=matriculas.idcrianca && crianca.idpessoa=pessoa.idpessoa 
        && matriculas.idturma='{$idturma}' && matriculas.statuscadastro=1
        && EXTRACT(YEAR FROM matriculas.anomatricula)='{$ano}'");
        return view('transferenciaAlunos.lista_alunos_transferencia')->with('nomeTurma', $nomeTurma)->with('listaTurmas', $listaTurmas)->with('numeroAlunos', $numeroAlunos)
        ->with('listaAlunos', $listaAlunos);
    }


}
