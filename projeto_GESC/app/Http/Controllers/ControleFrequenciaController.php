<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\ControleFrequancia;
use App\Turma;
use App\Dias_funcionamento;


class ControleFrequenciaController extends Controller {

    public function listaTurmas(){
        $aux=0;
        $numeroAlunos=[];
        $listaTurmas = DB::select('select turma.idturma, turma.GrupoConvivencia, turma.statusTurma, turma.Turno, turma.idusuario, usuario.Nome from usuario, turma
        where usuario.id = turma.idusuario && turma.statusTurma = 1');
        foreach($listaTurmas as $c){
            $aux = DB::select("select count(idturma) as numero from matriculas where idturma='{$c->idturma}'");
            array_push($numeroAlunos, $aux[0]->numero);
        }

        $mes= date("m");
        
        //$listaTurmas=[];
        return view('frequencia.controle_frequencia')->with('listaTurmas', $listaTurmas)->with('numeroAlunos', $numeroAlunos)
        ->with('mes', $mes);
    }

    public function listaAlunos($idturma, $mes){
        $mesSelect = $mes;
        $ano= date("Y");
        //$mesString;
        if(date("m")==1 && $mesSelect==12){
            $ano=$ano-1;
        }

        $nomeTurma = DB::select("select turma.grupoconvivencia, turma.turno, turma.idusuario, usuario.nome from usuario, turma
        where usuario.id = turma.idusuario && turma.idturma='{$idturma}'");

        
        $listaAlunos = DB::select("select pessoa.nomepessoa, matriculas.idmatricula from matriculas, crianca, pessoa
        where crianca.idcrianca=matriculas.idcrianca && crianca.idpessoa=pessoa.idpessoa 
        && matriculas.idturma='{$idturma}' && matriculas.statuscadastro=1
        && EXTRACT(MONTH FROM crianca.datacadastro)<='{$mes}' && EXTRACT(YEAR FROM matriculas.anomatricula)='{$ano}'");

        
        $mes= date("m");
        $teste= date("M");
        $teste_aux= [];
        //$dias_funcionamento = Dias_funcionamento::find($ano);
        //$dias_funcionamento = DB::select("select jan, frv, mar, mai, abr, jun, jul, ago, set, out, nov, dez from dias_funcionamento where idano={$ano}");
        if($mesSelect==1){
            $dias_funcionamento = DB::select("select jan as numero from dias_funcionamento where idano='{$ano}'");
        }elseif($mesSelect==2){
            $dias_funcionamento = DB::select("select fev as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mesSelect==3){
            $dias_funcionamento = DB::select("select mar as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mesSelect==4){
            $dias_funcionamento = DB::select("select abr as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mesSelect==5){
            $dias_funcionamento = DB::select("select mar as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mesSelect==6){
            $dias_funcionamento = DB::select("select jun as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mesSelect==7){
            $dias_funcionamento = DB::select("select jul as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mesSelect==8){
            $dias_funcionamento = DB::select("select ago as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mesSelect==9){
            $dias_funcionamento = DB::select("select setembro as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mesSelect==10){
            $dias_funcionamento = DB::select("select out as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mesSelect==11){
            $dias_funcionamento = DB::select("select nov as numero from dias_funcionamento where idano='{$ano}'");
        }else if($mesSelect==12){
            $dias_funcionamento = DB::select("select dez as numero from dias_funcionamento where idano='{$ano}'");
        }

        
        

        //$m = $mes-1;

        $frequenciaAtual = DB::select("select idfrequencia, totalfaltas, idmatricula from frequencia 
        where anofrequencia='{$ano}' && mesfrequencia='{$mesSelect}'");
        /*$frequenciaAnterior = DB::select("select idfrequencia, totalfaltas, idmatricula from frequencia 
        where anofrequencia='{$ano}' && mesfrequencia='{$m}'");*/
        /*
        $vetFrequenciaAtual=[];
        $i=0;

        foreach($frequenciaAtual as $c){
            $vetFrequenciaAtual[$i]=$c->totalfaltas;
            $i++;
        }

        $vetFrequenciaAtual=implode("|", )*/

        return view('frequencia.lista_alunos')->with("nomeTurma", $nomeTurma)->with("listaAlunos", $listaAlunos)
        ->with("ano", $ano)->with("mes", $mes)->with("frequenciaAtual", $frequenciaAtual)->with("idturma", $idturma)
        ->with("mesSelect", $mesSelect)->with("dias_funcionamento", $dias_funcionamento);
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