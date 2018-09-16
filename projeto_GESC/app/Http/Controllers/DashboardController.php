<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dashboard;

class DashboardController extends Controller
{
    public function painel(){
        $vagaOcupada=[];
        $matriculaIdade=[];
        $aux;
        $count=0;
        $ano= date("Y");
        $vagas = DB::select("select * from vagas where anovaga='{$ano}'");
        

        foreach($vagas as $v){
            $aux=DB::select("select count(idvaga) as numero from matriculas where statuscadastro='Ativo' 
                                            and idvaga='{$v->idvaga}' ");
            array_push($vagaOcupada, $aux[0]->numero);
            
        }

        for($count=1; $count<18; $count++){
            $aux=DB::select("select count(idade) as numroIdade from (select YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(pessoa.datanascimento))) AS idade 
            from matriculas, crianca, pessoa where crianca.idcrianca=matriculas.idcrianca 
            && crianca.idpessoa=pessoa.idpessoa && matriculas.statuscadastro=1 && EXTRACT(YEAR FROM anomatricula)='{$ano}') as idade where idade='{$count}';");
            array_push($matriculaIdade, $aux[0]->numroIdade);
        }
        $mes= date("m");
        $aniversarioMes = DB::select("select pessoa.nomepessoa, DATE_FORMAT(pessoa.datanascimento, '%d/%m/%Y') as datanascimento, YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(pessoa.datanascimento))) AS idade, turma.GrupoConvivencia from matriculas, crianca, pessoa , turma
        where crianca.idcrianca=matriculas.idcrianca && crianca.idpessoa=pessoa.idpessoa && matriculas.statuscadastro=1
        && matriculas.idturma=turma.idturma && EXTRACT(MONTH FROM pessoa.datanascimento)='{$mes}' && EXTRACT(YEAR FROM anomatricula)='{$ano}';");
        

        return view('dashboard.dashboard')->with('vagas', $vagas)->with('vagaOcupada', $vagaOcupada)->with('matriculaIdade', $matriculaIdade)
        ->with('aniversarioMes', $aniversarioMes);
    }
}
