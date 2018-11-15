<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FichaExport;

class FichaFrequenciaController extends Controller
{
    public function apresentaFichaFrequencia(){

        //echo("Teste");
        $mes = date("m");
        //$mes = "01";
        $ano = date('Y');

        return view('fichaFrequencia.fichaFrequenciaTela')->with('mes', $mes)->with('ano', $ano);

    }

    public function excel(Request $request){
        $teste=[];
        $mes=$request->periodo;
        $nomeresponsaveltec=$request->nomeresponsaveltec;
        $cpfresponsavel=$request->cpfresponsavel;
        $profissao=$request->profissao;
        $visitasdomiciliares=$request->visitasdomiciliares;
        $atendimentosgrupo=$request->atendimentosgrupo;
        $reuniaoacolhimento=$request->reuniaoacolhimento;
        $encaminhamentos=$request->encaminhamentos;
        $atendimentosindividuais=$request->atendimentosindividuais;
        $encaminhamentoprivada=$request->encaminhamentoprivada;
        $planoelaborado=$request->planoelaborado;
        $descricaoatividade=$request->descricaoatividade;
        $obs=$request->obs;

        if($mes==1){
            $mesdesc="Janeiro";
        }else if($mes==2){
            $mesdesc="Fevereiro";
        }else if($mes==3){
            $mesdesc="Março";
        }else if($mes==4){
            $mesdesc="Abril";
        }else if($mes==5){
            $mesdesc="Maio";
        }else if($mes==6){
            $mesdesc="Junho";
        }else if($mes==7){
            $mesdesc="Julho";
        }else if($mes==8){
            $mesdesc="Agosto";
        }else if($mes==9){
            $mesdesc="Setembro";
        }else if($mes==10){
            $mesdesc="Outubro";
        }else if($mes==11){
            $mesdesc="Novembro";
        }else if($mes==12){
            $mesdesc="Dezembro";
        }







        return Excel::download(new FichaExport($mes, $nomeresponsaveltec, $cpfresponsavel, $profissao,
        $visitasdomiciliares, $atendimentosgrupo, $reuniaoacolhimento, $encaminhamentos, $atendimentosindividuais,  $encaminhamentoprivada, $planoelaborado,
        $descricaoatividade, $obs, $mesdesc), 'Ficha_Frequencia.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        toastr()->Success('Ficha de Frenquênicia gerada com sucesso!');
        return redirect()->back();

        //echo("Teste");

    }
}