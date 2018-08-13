<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\ControleFrequancia;
use App\Turma;


class ControleFrequenciaController extends Controller {

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
        
        $listaAlunos = DB::select("select * from (select pessoa.nomepessoa, matriculas.idmatricula from ((matriculas, pessoa, crianca
        INNER JOIN matriculas as matriuca01 on matriuca01.idcrianca=crianca.idcrianca)
        INNER JOIN crianca as crianca01 on crianca01.idpessoa=pessoa.idpessoa) where matriculas.idturma='{$idturma}' && matriculas.statuscadastro=1) as tes
        GROUP BY idmatricula");

        $ano= date("Y");
        $mes= date("m");
        $m = $mes-1;

        $frequenciaAtual = DB::select("select idfrequencia, totalfaltas, idmatricula from frequencia 
        where anofrequencia='{$ano}' && mesfrequencia='{$mes}'");
        $frequenciaAnterior = DB::select("select idfrequencia, totalfaltas, idmatricula from frequencia 
        where anofrequencia='{$ano}' && mesfrequencia='{$m}'");

        return view('frequencia.lista_alunos')->with("nomeTurma", $nomeTurma)->with("listaAlunos", $listaAlunos)
        ->with("ano", $ano)->with("mes", $mes)->with("frequenciaAtual", $frequenciaAtual)->with("frequenciaAnterior", $frequenciaAnterior);
    }

    public function lancaFrequancia(Request $request){
        $numeroFaltas = $_POST['numerofaltas'];
        $idMatricula = $_POST['idmatricula'];
        $periodo = $_POST['periodo'];
        $idfrequencia = $_POST['idfrequencia'];
        echo($periodo);
        for ($i=0; $i<count($idMatricula); $i++){
            $frequencia = new ControleFrequancia();
            $frequencia->totalfaltas = $numeroFaltas[$i];
            $frequencia->idmatricula = $idMatricula[$i];
            $mes = date("m");
            $ano = date("Y");
            if($mes==1 && $periodo==12){
                $frequencia->anofrequencia = $ano-1;
            }else{
                $frequencia->anofrequencia = $ano;
            }
            $frequencia->mesfrequencia = $periodo; 

            if($idfrequencia[$i]==""){
                $frequencia->save();
            } else {
                $aux = $idfrequencia[$i];
                $frequencia = ControleFrequancia::find($aux);
                $frequencia->totalfaltas = $numeroFaltas[$i];
                $frequencia->update();
            }

            

            
            /*if($periodo=1){
                $mes = date("m");
                $ano = date("Y");
                if($mes==1){
                    $frequencia->mesfrequencia = 12;
                    $frequencia->anofrequencia = $ano-1;
                } else {
                $m = $mes-1;
                $frequencia->mesfrequencia = $m; 
                $frequencia->anofrequencia = $ano;
                }
                
            } else if($periodo=0){
                echo("Mes atual");
                $mes = date("m");
                $ano = date("Y");
                $frequencia->mesfrequencia = $mes;
                $frequencia->anofrequencia = $ano;
            }*/
            
        }
        /*foreach($_POST['numerofaltas'] as $c){
            $frequencia->totalfaltas = $c;
        }
        var_dump($numeroFaltas);*/
        return redirect()->action('ControleFrequenciaController@listaTurmas');

    }
}