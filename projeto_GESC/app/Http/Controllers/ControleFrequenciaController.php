<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\ControleFrequancia;
use App\Turma;


class ControleFrequanciaController extends Controller {

    public function listaTurmas(){
        $aux=0;
        $numeroAlunos=[];
        $listaTurmas = DB::select('select turma.idturma, turma.GrupoConvivencia, turma.statusTurma, turma.Turno, turma.idusuario, usuario.Nome from usuario, turma
        where usuario.idUsuario = turma.idUsuario && turma.statusTurma = 1');
        foreach($listaTurmas as $c){
        $aux = DB::select("select count(idturma) as numero from gesc_dois.`matriculas` where idturma='{$c->idturma}'");
        array_push($numeroAlunos, $aux[0]->numero);
        }
        
        //$listaTurmas=[];
        return view('frequencia.controle_frequencia')->with('listaTurmas', $listaTurmas)->with('numeroAlunos', $numeroAlunos);
    }

    public function listaAlunos($idturma){
        $nomeTurma = DB::select("select turma.GrupoConvivencia, turma.Turno, turma.idusuario, usuario.Nome from usuario, turma
        where usuario.idUsuario = turma.idUsuario && turma.idturma='{$idturma}'");
        //$listaAlunos = DB::select("select pessoa.nomepessoa, matriculas.idmatricula from pessoa, matricula, crianca where 
       // crianca.idcriaca==matricula.idcriaca";)
        return view('frequencia.lista_alunos')->with("nomeTurma", $nomeTurma);
    }
}